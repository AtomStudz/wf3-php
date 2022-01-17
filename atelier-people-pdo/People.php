<?php
class People
{
  private int $id;
  private ?string $avatar;
  private string $name;
  private string $firstname;
  // birthdate = attribut correspondant à la colonne birthdate
  // de la table people dans MySQL
  // Ce type va être renvoyé par MySQL comme une string (nullable)
  // On le laisse privé, sans getter & sans setter, pour le rendre interne
  // à la classe => on ne pourra pas du tout l'utiliser de l'extérieur
  private ?string $birthdate = null;
  // birthDate (avec un grand D) est l'attribut qu'on va exposer
  // à l'extérieur via un getter et un setter
  // On lui assigne un attribut DateTime en bonne et dûe forme
  private ?DateTime $birthDate;

  // Au moment de la construction de l'objet,
  // on va vérifier la valeur de birthdate (depuis MySQL)
  // Pour transformer cette date en DateTime si !== null
  public function __construct()
  {
    if ($this->birthdate !== null) {
      $this->birthDate = new DateTime($this->birthdate);
    } else {
      $this->birthDate = null;
    }
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function setId(int $id): self
  {
    $this->id = $id;

    return $this;
  }

  public function getAvatar(): ?string
  {
    return $this->avatar;
  }

  public function setAvatar(?string $avatar): self
  {
    $this->avatar = $avatar;

    return $this;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function setName(string $name): self
  {
    $this->name = $name;

    return $this;
  }

  public function getFirstname(): string
  {
    return $this->firstname;
  }

  public function setFirstname(string $firstname): self
  {
    $this->firstname = $firstname;

    return $this;
  }

  public function getBirthDate(): ?DateTime
  {
    return $this->birthDate;
  }

  public function setBirthDate(?DateTime $birthDate): self
  {
    $this->birthDate = $birthDate;

    return $this;
  }
}
