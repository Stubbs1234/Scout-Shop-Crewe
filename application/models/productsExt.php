<?php


class productsExt extends database
{
    public function getAllProductsCat()
    {
        $sqlGroup = "SELECT * FROM product_summary";

        $result = $this->runQuery($sqlGroup);

        if ($result->num_rows > 0) {
            while($group = $result->fetch_assoc()){
                $list[] = array('id' => $group['id'], 'productname' => $group['productname']);

            }
        }

        return $list;
    }

    public function renderProductsWithoutHTML()
    {
        $data = $this->getAllProductsCat();

        $html = null;

        foreach ($data as $value) {
            $html .= "<option value='" . $value['id'] . "'>" . $value['productname'] . "</option>";
        }

        return $html;
    }

}