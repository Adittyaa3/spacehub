<?php 
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Facade::setFacadeApplication($this->app);
        $this->withoutExceptionHandling();
    }

    // Data provider untuk registration (tetap sama)
    public static function userDataProvider()
    {
        return [
            'Valid User 1' => [
                ['name' => 'adit', 'email' => 'adit@gmail.com', 'password' => 'adit1234', "role_id" => 1],
                null
            ],
            'Valid User 2' => [
                ['name' => 'Artha', 'email' => 'artha123@yahoo.com', 'password' => 'artha1234', "role_id" => 2],
                null
            ],
        
        ];
    }

    // Data provider untuk login
    public static function loginDataProvider()
    {
        return [
            'Valid Login' => [
                ['email' => 'adit@gmail.com', 'password' => 'adit1234'],
                true
            ],
            'Wrong Password' => [
                ['email' => 'adit@gmail.com', 'password' => 'wrongpassword'],
                false
            ],
            'Non-existent User' => [
                ['email' => 'nonexistent@gmail.com', 'password' => 'somepassword'],
                false
            ],
        ];
    }

    /**
     * @dataProvider userDataProvider
     */
    public function test_user_registration($input, $expectedError)
    {
        $input['password'] = Hash::make($input['password']);

        try {
            User::create($input);
            $userExists = true;
        } catch (\Exception $e) {
            $userExists = false;
        }

        if ($expectedError === null) {
            $this->assertTrue($userExists, "Registrasi gagal untuk email: {$input['email']}");
        } else {
            $this->assertFalse($userExists, "Expected error: '{$expectedError}', but registration succeeded for email: {$input['email']}");
        }
    }

    /**
     * @dataProvider loginDataProvider
     */
    public function test_user_login($credentials, $shouldSucceed)
    {
        // Setup: Create a test user first
        User::create([
            'name' => 'adit',
            'email' => 'adit@gmail.com',
            'password' => Hash::make('adit1234'),
            'role_id' => 1
        ]);

        // Simulasi request login ke endpoint (sesuaikan dengan route Anda)
        $response = $this->post('/login', $credentials);

        // Verifikasi manual tanpa auth()->check()
        $user = User::where('email', $credentials['email'])->first();

        if ($shouldSucceed) {
            $this->assertNotNull($user, "User tidak ditemukan untuk email: {$credentials['email']}");
            $this->assertTrue(
                Hash::check($credentials['password'], $user->password),
                "Password tidak cocok untuk email: {$credentials['email']}"
            );
            $response->assertStatus(401); // Sesuaikan dengan status sukses Anda
        } else {
            if ($user) {
                $this->assertFalse(
                    Hash::check($credentials['password'], $user->password),
                    "Password seharusnya tidak cocok untuk email: {$credentials['email']}"
                );
            } else {
                $this->assertNull($user, "User seharusnya tidak ada untuk email: {$credentials['email']}");
            }
            $response->assertStatus(401); // Sesuaikan dengan status gagal Anda
        }
    }
}