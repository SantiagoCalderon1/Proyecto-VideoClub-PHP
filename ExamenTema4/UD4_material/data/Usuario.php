<?php
class Usuario{
    public function __construct(
        private string $username = '',
        private string $password = ''
    ) {
    }

    function getUsername() : string {
        return $this->username;
    }
    function getPassword() : string {
        return $this->password;
    }
    
    function setUSername(string $newUSername) : object {
        $this->username = $newUSername;
        return $this;
    }
    function setPassword(string $newPassword) : object {
        $this->password = $newPassword;
        return $this;
    }
}
?>