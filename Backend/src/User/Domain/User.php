<?php

namespace Src\User\Domain;

use Src\Shared\Domain\ValueObjects\NumInteger;
use Src\Shared\Domain\ValueObjects\Text;

class User
{

    private NumInteger $id;
    private Text $code;
    private Text $name;
    private Text $lastName;
    private Text $email;
    private Text $phone;
    private NumInteger $idPosition;
    private NumInteger $idRol;

    private Text $position;
    private Text $rol;
    private Text $username;
    private Text $password;
    private Text $token;

    /**
     * @param NumInteger $id
     * @param Text $code
     * @param Text $name
     * @param Text $lastName
     * @param Text $email
     * @param Text $username
     * @param Text $phone
     * @param NumInteger $idPosition
     * @param NumInteger $idRol
     */
    public function __construct(
        NumInteger          $id,
        Text                $code,
        Text                $name,
        Text                $lastName,
        Text                $email,
        Text                $phone,
        Text                $username,
        Text                $password,
        NumInteger          $idPosition,
        NumInteger          $idRol,
    )
    {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->phone = $phone;
        $this->idPosition = $idPosition;
        $this->idRol = $idRol;
        $this->username = $username;
        $this->password = $password;
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
    public function getCode(): Text
    {
        return $this->code;
    }

    /**
     * @param Text $code
     */
    public function setCode(Text $code): void
    {
        $this->code = $code;
    }

    /**
     * @return Text
     */
    public function getName(): Text
    {
        return $this->name;
    }

    /**
     * @param Text $name
     */
    public function setName(Text $name): void
    {
        $this->name = $name;
    }

    /**
     * @return Text
     */
    public function getLastName(): Text
    {
        return $this->lastName;
    }

    /**
     * @param Text $lastName
     */
    public function setLastName(Text $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return Text
     */
    public function getEmail(): Text
    {
        return $this->email;
    }

    /**
     * @param Text $email
     */
    public function setEmail(Text $email): void
    {
        $this->email = $email;
    }

    /**
     * @return Text
     */
    public function getPhone(): Text
    {
        return $this->phone;
    }

    /**
     * @param Text $phone
     */
    public function setPhone(Text $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return Text
     */
    public function getUsername(): Text
    {
        return $this->username;
    }

    /**
     * @param Text $username
     */
    public function setUsername(Text $username): void
    {
        $this->username = $username;
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
     * @return NumInteger
     */
    public function getIdPosition(): NumInteger
    {
        return $this->idPosition;
    }

    /**
     * @param NumInteger $idPosition
     */
    public function setIdPosition(NumInteger $idPosition): void
    {
        $this->idPosition = $idPosition;
    }

    /**
     * @return NumInteger
     */
    public function getIdRol(): NumInteger
    {
        return $this->idRol;
    }

    /**
     * @param NumInteger $idRol
     */
    public function setIdRol(NumInteger $idRol): void
    {
        $this->idRol = $idRol;
    }

    /**
     * @return Text
     */
    public function getPosition(): Text
    {
        return $this->position;
    }

    /**
     * @param Text $position
     */
    public function setPosition(Text $position): void
    {
        $this->position = $position;
    }

    /**
     * @return Text
     */
    public function getRol(): Text
    {
        return $this->rol;
    }

    /**
     * @param Text $rol
     */
    public function setRol(Text $rol): void
    {
        $this->rol = $rol;
    }

    /**
     * @return Text
     */
    public function getToken(): Text
    {
        return $this->token;
    }

    /**
     * @param Text $token
     */
    public function setToken(Text $token): void
    {
        $this->token = $token;
    }





    public function toArray(): array{
        return [
            'id'                    => $this->id->value(),
            'code'                  => $this->code->value(),
            'name'                  => $this->name->value(),
            'lastname'              => $this->lastName->value(),
            'email'                 => $this->email->value(),
            'phone'                 => $this->phone->value(),
            'username'              => $this->username->value(),
            'password'              => $this->password->value(),
            'id_position'           => $this->idPosition->value(),
            'position'              => $this->position->value(),
            'id_rol'                => $this->idRol->value(),
            'rol'                   => $this->rol->value()
        ];
    }

    public function toArrayWithZeroId(): array{
        return [
            'id'                    => 0,
            'code'                  => $this->code->value(),
            'name'                  => $this->name->value(),
            'lastname'              => $this->lastName->value(),
            'email'                 => $this->email->value(),
            'phone'                 => $this->phone->value(),
            'username'              => $this->username->value(),
            'password'              => $this->password->value(),
            'id_position'           => $this->idPosition->value(),
            'position'              => $this->position->value(),
            'id_rol'                => $this->idRol->value(),
            'rol'                   => $this->rol->value()
        ];
    }

    public function toArrayWithZeroIdAndWithoutRelation(): array{
        return [
            'id'                    => 0,
            'code'                  => $this->code->value(),
            'name'                  => $this->name->value(),
            'lastname'              => $this->lastName->value(),
            'email'                 => $this->email->value(),
            'phone'                 => $this->phone->value(),
            'username'              => $this->username->value(),
            'password'              => $this->password->value(),
            'id_position'           => $this->idPosition->value(),
            'id_rol'                => $this->idRol->value(),
        ];
    }

    public function toArrayWithZeroIdAndWithoutRelationUpdate(): array{
        return [
            'id'                    => $this->id->value(),
            'name'                  => $this->name->value(),
            'lastname'              => $this->lastName->value(),
            'email'                 => $this->email->value(),
            'phone'                 => $this->phone->value(),
            'id_position'           => $this->idPosition->value(),
            'id_rol'                => $this->idRol->value(),
        ];
    }

}
