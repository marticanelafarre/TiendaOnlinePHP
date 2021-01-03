<?php session_start();
class Cart {
    protected $cart_contents = array(); // creamos array llamada cart_contents.
	
	
    public function __construct(){
        //creamos la funcion __construct para cojer el carrito de la sesion.
        $this->cart_contents = !empty($_SESSION['cart_contents'])?$_SESSION['cart_contents']:NULL;
		if ($this->cart_contents === NULL){
			// ponemos valores por defecto
			$this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
		}
    }
    
	// creamos la funcion contents
	public function contents(){
		// organizamos el array creando anteriormente
		$cart = array_reverse($this->cart_contents);

		// eliminamos para no crear un error a la hora de printar la tabla.
		unset($cart['total_items']);
		unset($cart['cart_total']);

		return $cart; //retornamos el valor.
	}
    
    //creamos la funcion get_item para que te devuelva todos los datos del articulo selecionado. 
	public function get_item($row_id){
		return (in_array($row_id, array('total_items', 'cart_total'), TRUE) OR ! isset($this->cart_contents[$row_id]))
			? FALSE
			: $this->cart_contents[$row_id];
	}
    
    // creamos esta funcion para que nos cuente el total de los articulos selecionados. 
	public function total_items(){
		return $this->cart_contents['total_items'];
	}
    
    // creamos funciona total para que te devuelva el precio total del carrito actual. 
	public function total(){
		return $this->cart_contents['cart_total'];
	}
    
    // creamos esta funcion para guardar los articulos selecionados por el usuario en el array creado anteriormente y tambien en la sesion del usuario.
	public function insert($item = array()){
		if(!is_array($item) OR count($item) === 0){
			return FALSE;
		}else{
            if(!isset($item['id'], $item['nombre'], $item['precio'], $item['qty'])){
                return FALSE;
            }else{
				//afegim
				//cantidad    
                $item['qty'] = (float) $item['qty'];
                if($item['qty'] == 0){
                    return FALSE;
                }
                //precio
                $item['precio'] = (float) $item['precio'];
				//creamos un id para el articulo que se pone en el carrito
				$rowid = md5($item['id']);
                // cogemos la cantidad y la guardamos
                $old_qty = isset($this->cart_contents[$rowid]['qty']) ? (int) $this->cart_contents[$rowid]['qty'] : 0;
                // actualizamos los datos. 
                $item['rowid'] = $rowid;
                $item['qty'] += $old_qty;
                $this->cart_contents[$rowid] = $item;
                
                // guardamos el articulo en el carrito. 
                if($this->save_cart()){
                    return isset($rowid) ? $rowid : TRUE;
                }else{
                    return FALSE;
                }
            }
        }
	}
    
    // creamos funcion para guardar el array con la sesion iniciada. 
	protected function save_cart(){
		$this->cart_contents['total_items'] = $this->cart_contents['cart_total'] = 0;
		foreach ($this->cart_contents as $key => $val){
			// miramos que concurde los datos de la matriz
			if(!is_array($val) OR !isset($val['precio'], $val['qty'])){
				continue;
			}	 
			$this->cart_contents['cart_total'] += ($val['precio'] * $val['qty']);
			$this->cart_contents['total_items'] += $val['qty'];
			$this->cart_contents[$key]['subtotal'] = ($this->cart_contents[$key]['precio'] * $this->cart_contents[$key]['qty']);
		}
		
		// si el carrito esta vacio lo eliminamos de la sesion.
		if(count($this->cart_contents) <= 2){
			unset($_SESSION['cart_contents']);
			return FALSE;
		}else{
			$_SESSION['cart_contents'] = $this->cart_contents;
			return TRUE;
		}
    }
    
    //funcion para elimar un producto del carrito
	 public function remove($row_id){
		// unset & save
		unset($this->cart_contents[$row_id]);
		$this->save_cart();
		return TRUE;
	 }
     
    //funciona para eliminar el contenido del carrito
	public function destroy(){
		$this->cart_contents = array('cart_total' => 0, 'total_items' => 0);
		unset($_SESSION['cart_contents']);
	}
}