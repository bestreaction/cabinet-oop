<?php 

class Cabinet 
{
    /** @var ShelfManager */
    private $shelfManager;

    public function __construct() {
        $this->shelfManager = new ShelfManager();
    }
    
    public function put(int $boxes = 1) {
        try {
            for($i = 1; $i <= $boxes; $i++) {
                $this->shelfManager->put(new Box());
            }
        } catch (ShelvesFullException $exception) {
           echo 'Cabine is full.';
        }
    }
    
    public function getFreeSpace() {
        return $this->shelfManager->getFreeSpace();
    }
}