<?php

namespace Src\User\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class UserChangePassword
{

    private NumInteger $id;
    private Text $password;
    private Text $passwordConfirmation;

    /**
     * @param NumInteger $id
     * @param Text $password
     * @param Text $passwordConfirmation
     */
    public function __construct(
        NumInteger          $id,
        Text                $password,
        Text                $passwordConfirmation,
    )
    {

        $this->id = $id;
        $this->password = $password;
        $this->passwordConfirmation = $passwordConfirmation;
    }

    /**
     * @return NumInteger
     */
    public function getId(): NumInteger
    {
        return $this->id;
    }

    /**
     * @param NumInteger $id
     */
    public function setId(NumInteger $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Text
     */
    public function getPassword(): Text
    {
        return $this->password;
    }

    /**
     * @param Text $password
     */
    public function setPassword(Text $password): void
    {
        $this->password = $password;
    }

    /**
     * @return Text
     */
    public function getPasswordConfirmation(): Text
    {
        return $this->passwordConfirmation;
    }

    /**
     * @param Text $passwordConfirmation
     */
    public function setPasswordConfirmation(Text $passwordConfirmation): void
    {
        $this->passwordConfirmation = $passwordConfirmation;
    }


}
