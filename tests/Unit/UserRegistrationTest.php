<?php


namespace Tests\Unit;

use App\Models\User;
use PHPUnit\Framework\TestCase;

class UserRegistrationTest extends TestCase
{
    protected User $user;
    protected array $expectedUserData;

    public function setUp(): void
    {
        $this->expectedUserData = [
            'username' => 'test_user_1',
            'email' => 'testuser1@test.com',
            'password' => password_hash('testuser1password', PASSWORD_DEFAULT),
            'is_admin' => '0',
            'department_id' => '2'
        ];
        $this->user = new User();
    }

    public function test_user_can_register_with_valid_information(): void
    {
        $this->user->createUser($this->expectedUserData);

        $actualUser = $this->user->getUser(['username'=>'test_user_1']);

        $this->assertEquals($this->expectedUserData['username'], $actualUser->username);
        $this->assertEquals($this->expectedUserData['email'], $actualUser->email);
        $this->assertEquals($this->expectedUserData['is_admin'], $actualUser->is_admin);
        $this->assertEquals($this->expectedUserData['department_id'], $actualUser->department_id);
    }

    public function test_user_cannot_register_with_pre_existing_email(): void
    {
        $this->expectException(\PDOException::class);
        $this->user->createUser($this->expectedUserData);
    }

    public function test_user_cannot_register_with_pre_existing_username(): void
    {
        $this->expectException(\PDOException::class);
        $this->user->createUser($this->expectedUserData);
    }

}
