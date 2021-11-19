<?php
    class clsCarrito {

        //aquí guardamos el contenido del carrito (Session)
        private $carrito = array(); 

        //seateamo el carrito exista o no exista en el constructor
        public function __construct(){
            if(!isset($_SESSION['carrito'])){
                $_SESSION['carrito'] = null;
                $this->carrito['precio_total'] = 0;
                $this->carrito['articulos_total'] = 0;
            }
            $this->carrito =  $_SESSION['carrito'];
        }

        //Agregar un producto al carrito
        public function add($articulo = array()){
            //primero comprobemos el articulo a añadir, si esta vacio o no es un
            //array vamos a mostrar un mensaje y vamos a cortar la ejecución de los demas codigos.
            if(!is_array($articulo) || empty($articulo)){
                throw new Exception("Error, el articulo ingreso no es un array!", 1);
                
            }

            //nuestro carrito necesita tener siempre un id, cantidad y un precio
            if($articulo['id'] || $articulo['cantidad'] || $articulo['precio']){
                throw new Exception("Error, el artículo debe tener un id, cantidad y precio", 1);
                
            }

            //validar que el id cantidad y precio sean campos numéricos
            if(!is_numeric($articulo['id']) || !is_numeric($articulo['cantidad']) || !is_numeric($articulo['precio'])){
                throw new Exception("Error, el id, cantidad y precio deben ser numéricos.", 1);
            }

            //creamos la id única para el producto
            $unique_id = $articulo['id'];

            $articulo['unique_id'] = $unique_id;

            //Si no esta vacio el carrito lo vamos a recorrer

            if(!empty($this->carrito)){
                foreach ($this->carrito as $row) {
                    //comprobar si este producto ya esta en el carrito(Actualizar)
                    //y si no esta vamos a insertar
                    if($row['unique_id'] === $unique_id){
                        $articulo['cantidad'] = $row['cantidad'] + $articulo['cantidad'];
                    }
                }
            }

            //evitar que nos ingresen numeros con signo negativo
            $articulo['cantidad'] = trim(preg_replace('([^0-9\.])/i', '', $articulo['cantidad']));
            $articulo['precio'] = trim(preg_replace('([^0-9\.])/i', '', $articulo['precio']));

            //Añadir un total al array carrito para saber el precio del total de la suma de este artículo.
            $articulo['total'] = $articulo['cantidad'] * $articulo['precio'];



        }






            

        }

        







    }

?>