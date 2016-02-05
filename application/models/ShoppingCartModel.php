<?php

class ShoppingCartModel extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function add_items_to_cart($items = null)
    {
        if (is_null($items) || count($items) < 0 || ! is_array($items))
            return FALSE;
        $is_transactional = FALSE;
        try {
            if ((int) $items['product_associate_sale'] === 0) {
                $this->db->trans_begin();
                $reference_sale = $this->generate_reference_id_sale();
                if (! $reference_sale) {
                    $this->db->trans_rollback();
                    return FALSE;
                }
                $is_transactional = TRUE;
                $items['product_associate_sale'] = $reference_sale;
            }
            
            $this->db->insert('cn_carrito_items', array(
                'carrito_id' => (int) $items['product_associate_sale'],
                'producto_sku' => $items['product_sku'],
                'cantidad' => (int) $items['product_quantity']
            ));
            
            $reference_item_product = $this->db->insert_id();
            
            if ($reference_item_product > 0) {
                if ($is_transactional)
                    $this->db->trans_commit();
                return array(
                    'reference_id_sale' => $items['product_associate_sale'],
                    'reference_item_id' => $reference_item_product
                );
            } else {
                $this->db->trans_rollback();
                return FALSE;
            }
        } catch (Exception $e) {
            return FALSE;
        }
    }

    private function generate_reference_id_sale()
    {
        try {
            $this->db->insert('cn_carrito', array(
                'empleado_id' => 1
            ));
            return $this->db->insert_id();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function get_items($cart_id = null)
    {
        try {
            $_SQL = 'SELECT ci.id as item_id,ci.carrito_id, ci.producto_sku, ci.cantidad,p.nombre as articulo,p.precio,p.id as producto_id,pd.porcentaje_descuento,pd.nombre_descuento
            FROM cn_carrito_items ci
            INNER JOIN cn_producto p ON ci.producto_sku = p.magento_sku
            LEFT JOIN cn_producto_descuentos pd ON ci.descuento_id = pd.id  WHERE ci.carrito_id=?';
            
            $query = $this->db->query($_SQL, array(
                $cart_id
            ));
            
            return $query->result();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function delete_item($item_id = null)
    {
        if (is_null($item_id) || (int) $item_id === 0)
            return FALSE;
        try {
            
            $this->db->where(array(
                'id' => $item_id
            ));
            $this->db->limit(1);
            $this->db->delete('cn_carrito_items');
            
            return $this->db->affected_rows();
        } catch (Exception $e) {
            return FALSE;
        }
    }

    function add_discount($data = null)
    {
        if (is_null($data) || count($data) < 0 || ! is_array($data))
            return FALSE;
        try {
            $this->db->where(array(
                'id' => $data['item_id']
            ));
            $this->db->limit(1);
            $this->db->update('cn_carrito_items', array(
                'descuento_id' => $data['item_discount_id']
            ));
            return $this->db->affected_rows();
        } catch (Exception $e) {
            return FALSE;
        }
    }
}