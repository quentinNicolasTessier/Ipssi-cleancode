<?php
namespace Ipssi\Cart;
use PDO;
class ProductRepository{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct(PDO $pdo){
        $this->pdo=$pdo;
    }

    public function find($id)
    {
        if ($id === '' || $id <= 0) {
            throw new \InvalidArgumentException("id $id is invalid");
        }

        $sql = 'SELECT * FROM product WHERE id=?';
        $stmt = $this->getPDO()->prepare($sql);
        $product=null;
        if ($stmt->execute([$id])) {
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            if($result){
                $product=$this->mapToProduct($result);
            }
            return $product;
        }
    }
    public function mapToProduct (\stdClass $product)
    {
         return new Product(
             $product->id,
             $product->name,
             $product->price
            );


    }

    /**
     * Get the value of pdo
     *
     * @return  PDO
     */ 
    public function getPdo()
    {
        return $this->pdo;
    }
}
