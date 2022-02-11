<?php
 // clase de nodo
class Node {
         public $data; // datos de nodo
         public $next; // siguiente nodo

    public function __construct($data) {
        $this->data = $data;
        $this->next = NULL;
    }
}
 // Lista enlazada individual
class SingleLinkedList {
       private $header; // nodo principal

   function __construct($data) {
      $this->header = new Node($data);
   }
       // Encontrar nodo
   public function find($item) {
      $current = $this->header;
      while ($current->data != $item) {
         $current = $current->next;
      }
      return $current;
   }
       // (después del nodo) inserte un nuevo nodo
   public function insert($item, $new) {
       $newNode = new Node($new);
       $current = $this->find($item);
        $newNode->next = $current->next;
      $current->next = $newNode;
      return true;
   }

         // Actualizar nodo
    public function update($old, $new) {
        $current = $this->header;
        if ($current->next == null) {
                echo "¡La lista vinculada está vacía!";
            return;
        }
        while ($current->next != null) {
            if ($current->data == $old) {
                break;
            }
            $current = $current->next;
        }
        return $current->data = $new;
    }

         // Encuentra el nodo anterior del nodo que se va a eliminar
    public function findPrevious($item) {
        $current = $this->header;
        while ($current->next != null && $current->next->data != $item) {
            $current = $current->next;
        }
        return $current;
    }

         // Eliminar un nodo de la lista vinculada
    public function delete($item) {
        $previous = $this->findPrevious($item);
        if ($previous->next != null) {
            $previous->next = $previous->next->next;
        }
    }

         // Integración de findPrevious y delete
    public function remove($item) {
        $current = $this->header;
        while ($current->next != null && $current->next->data != $item) {
            $current = $current->next;
        }
        if ($current->next != null) {
            $current->next = $current->next->next;
        }
    }

         // Vaciar la lista vinculada
    public function clear() {
       $this->header = null;
    }

         // Mostrar los elementos en la lista vinculada
    public function display() {
        $current = $this->header;
        if ($current->next == null) {
                         echo "¡La lista vinculada está vacía!";
            return;
        }
        while ($current->next != null) {
            echo $current->next->data . "&nbsp;&nbsp;&nbsp";
            $current = $current->next;
        }
    }
}

$linkedList = new SingleLinkedList('header');
$linkedList->insert('header', 'China');
$linkedList->insert('China', 'USA');
$linkedList->insert('USA','England');
$linkedList->insert('England','Australia');
 echo'La lista vinculada es: ';
$linkedList->display();
echo "</br>";
 echo '----- Eliminar nodo USA -----';
echo "</br>";
$linkedList->delete('USA');
 echo'La lista vinculada es: ';
$linkedList->display();
echo "</br>";
 echo '----- Actualizar nodo Inglaterra a Japón -----';
echo "</br>";
    $linkedList->update('England', 'Japan');
 echo'La lista vinculada es: ';
$linkedList->display();
//echo "</br>";
 // echo "----- Lista enlazada vacía -----";
//echo "</br>";
//$linkedList->clear();
//$linkedList->display();
/* 
 // salida:
 La lista vinculada es: China Estados Unidos Inglaterra Australia   
 ----- eliminar nodo USA -----
 La lista vinculada es: China Inglaterra Australia   
 ----- Actualizar nodo Inglaterra a Japón -----
 La lista vinculada es: China Japón Australia    */