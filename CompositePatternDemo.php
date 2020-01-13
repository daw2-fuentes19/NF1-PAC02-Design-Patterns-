<html>
<body>
<head>
<style>
body {font : 12px verdana; font-weight:bold}
td {font : 11px verdana;}
</style>
</head>

<?php

abstract class AbstractConstruccion {
  
 
  private $contrucciones = array();
  private $name;
  private $superficie;
  public $contador=0;
  public function add(AbstractConstruccion  $contrucciones) {
     array_push($this->contrucciones, $contrucciones);
  }
  
  public function remove(AbstractConstruccion  $contrucciones) {
     array_pop($this->contrucciones);
  }
        
  public function hasChildren() {
    return (bool)(count($this->contrucciones) > 0);
  }
    
  public function getChild($i) {
    return $this->contrucciones[i];
  }
    
  public function getDescription() {
    echo "- one " . $this->getName();
    echo "- one " . $this->getSuperficie();
    if ($this->hasChildren()) {
      echo " which includes:<br>";
      foreach($this->contrucciones as $contrucciones) {
         echo "<table cellspacing=5 border=0><tr><td>&nbsp;&nbsp;&nbsp;</td><td>-";
         $contrucciones->getDescription();
          //$contador=$contador+$construcciones->getSuperficie();
         echo "</td></tr></table>";
      
      }        
    }
  }
  
 public function setName($name) {
   $this->name = $name;
 }
  
 public function getName() {
   return $this->name;
 }
         
 public function setSuperficie($superficie) {
    $this->superficie = $superficie;
 }

 public function getSuperficie() {
   return $this->superficie;
  }
  public function sumar(){
     $suma=$this->getSuperficie();
 foreach($this->contrucciones as $contrucciones) {
  
        $suma =$suma+$contrucciones->sumar();
      }  
     return $suma;
  }
}

class Habitacio extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setSuperficie(34);
  }      
}

class Porta extends AbstractConstruccion {
  function __construct($name) {
   parent::setName($name);
   parent::setSuperficie(23);
  }
}

class Finestra extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setSuperficie(45);
  }
}

class BaseDrum extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory("base drums");
  }
}

class Cymbal extends AbstractConstruccion {
  function __construct($name) {
    parent::setName($name);
    parent::setCategory(55);
  }
}


$habitacio = new Habitacio("Habitacion");
$habitacio->add(new Porta("Puerta"));
$habitacio->add(new Finestra("Finestra"));
$habitacio = new Habitacio("Habitacion2");


 

$porta = new Porta("Puerta");

$porta->add(new Porta("large high hat"));

$habitacio->add($porta);
$habitacio->add($porta);




echo "List of Instruments: <p>";

$habitacio->getDescription();
$porta->getDescription();
echo $habitacio->sumar();

?>

</body>
</html>
