<?php
namespace Src\Models\Users;
use Src\Models\ActiveRecordEntity;
use Src\Exceptions\InvalidArgumentException;
class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $isConfirmed;
    protected $role;
    protected $passwordHash;
    protected $authToken;
    protected $createdAt;

    public function setAuthToken($string)
    {
        $user = new User;
        $user->authToken = $string;
    }
    public function getEmail():string
    {
        return $this->email;
    }
    public function getNickname():string
    {
        return $this->nickname;
    }

    public function getPasswordHash():string
    {
        return $this->passwordHash;
    }
    public function getAuthToken():string 
    {
        return $this->authToken;
    }

    public function getRole():string 
    {
        return $this->role;
    }

    protected static function getTableName():string
    {
        return 'users';
    }

    public static function signUp(array $userData )
    {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передан nickname');
        }
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
            throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита');
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Email введен некорректно');
        }
        if (mb_strlen($userData['password'])  < 8) {
            throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
        }
        if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким nickname уже существует');
        }
        if (static::findOneByColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким email уже существует');
        }
        if ($userData['password'] !== $userData['password_repeat']) {
            throw new InvalidArgumentException('Подтверждение пароля введено неверно');
        }

        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->role = 'user';
        $user->isConfirmed = true;
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $user->save();
        return $user;
    }

    public static function login(array $loginData ):User
    {
        if (empty($loginData['email'])) {
            throw new InvalidArgumentException('Не передан email');
        }
        if (empty($loginData['password'])) {
            throw new InvalidArgumentException('Не передан password');
        }
        $user = User::findOneByColumn('email', $loginData['email']);
        if ($user === null) {
            throw new InvalidArgumentException('Такого пользователя не существует');
        }
        if (!password_verify($loginData['password'], $user->getPasswordHash())) {
            throw new InvalidArgumentException('Неправильный пароль');
        }
        if (!$user->isConfirmed) {
            throw new InvalidArgumentException('Пользователь не подтвержден');
        }
        $user->refreshAuthToken();
        $user->save();
        return $user;
    }

    public function edit(array $userData )
    {
        // var_dump($this);
        if (!empty($userData['nickname']) && $userData['nickname'] !== $this->getNickname()) {
            if (!preg_match('/^[a-zA-Z0-9]+$/', $userData['nickname'])) {
                throw new InvalidArgumentException('Nickname может состоять только из символов латинского алфавита');
            }
            if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
                throw new InvalidArgumentException('Пользователь с таким nickname уже существует');
            }
            
            $this->nickname = $userData['nickname'];
            // throw new InvalidArgumentException('Не передан nickname');
        }
        if (!empty($userData['email']) && $userData['email'] !== $this->getEmail()) {
            if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException('Email введен некорректно');
            }
            if (static::findOneByColumn('email', $userData['email']) !== null) {
                throw new InvalidArgumentException('Пользователь с таким email уже существует');
            }
            $this->email = $userData['email'];

            // throw new InvalidArgumentException('Не передан email');
        }
        if (!empty($userData['password'])) {
            if (mb_strlen($userData['password'])  < 8) {
                throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');
            }
            if ($userData['password'] !== $userData['password_repeat']) {
                throw new InvalidArgumentException('Подтверждение пароля введено неверно');
            }
            $this->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);

            // throw new InvalidArgumentException('Не передан password');
        }
        // $user = new User();
        // $user->nickname = $userData['nickname'];
        // $user->email = $userData['email'];
        // $user->passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);
        // $user->role = 'user';
        // $user->isConfirmed = true;
        // $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
        $this->save();
        return $this;
    }

    private function refreshAuthToken()
    {
        $user = new User;
        $user->authToken = sha1(random_bytes(100)) . sha1(random_bytes(100));
    }
    
}

?>