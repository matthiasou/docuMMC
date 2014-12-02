<?php
/**
 * @Entity
 * @Table(name="utilisateur")
 */
class Utilisateur {
    /**
     * @Id @Column(type="integer")
     * @GeneratedValue
     */
    private $id;


    /**
     * @Column(type="string")
     * @var string
     */
    private $login;
    /**
     * @Column(type="string")
     * @var string
     */
    private $password;
    /**
     * @Column(type="string")
     * @var string
     */
    private $nom;
    /**
     * @Column(type="string")
     * @var string
     */
    private $prenom;
    /**
     * @Column(type="string")
     * @var string
     */
    private $mail;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param string $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }



    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }


    /**
     * @var \Monde
     *
     * @ORM\ManyToOne(targetEntity="Monde")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMonde", referencedColumnName="id")
     * })
     */
    private $idmonde;

    /**
     * @var \Groupe
     *
     * @ORM\ManyToOne(targetEntity="Groupe")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idGroupe", referencedColumnName="id")
     * })
     */
    private $idgroupe;


    /**
     * Set idmonde
     *
     * @param \Monde $idmonde
     * @return Utilisateur
     */
    public function setIdmonde(\Monde $idmonde = null)
    {
        $this->idmonde = $idmonde;
    
        return $this;
    }

    /**
     * Get idmonde
     *
     * @return \Monde 
     */
    public function getIdmonde()
    {
        return $this->idmonde;
    }

    /**
     * Set idgroupe
     *
     * @param \Groupe $idgroupe
     * @return Utilisateur
     */
    public function setIdgroupe(\Groupe $idgroupe = null)
    {
        $this->idgroupe = $idgroupe;
    
        return $this;
    }

    /**
     * Get idgroupe
     *
     * @return \Groupe 
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }
}