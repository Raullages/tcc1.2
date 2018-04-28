<?php

    include('./conexao/conexao')
    $arquivo = $_POST['codigo'];


    $row = 1;
      if (($handle = fopen($arquivo, "r")) !== FALSE)
      {
        //Passagem pelas linhas
        while (($data = fgetcsv($handle, ",")) !== FALSE)
        {
            $num = count($data);
            $row++;
            // Passagem pelas colunas
            for ($col = 0; $col < $num; $col++)
            {
                //Printando apenas a coluna 13
                if($col == 1)
                {

                // echo $data[$col]."";
                $cadastrando_csv = $conexao->query("INSERT INTO $nomeTabela (layer, positionX, positionY, positionZ, length, area) VALUES
                ('$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]')");

                }
            }
        }
        echo "<script>alert('Cadastro de csv efetuado')</script>";
      }
  fclose($handle);

  $resultado = $conexao->query("SELECT * FROM $nomeTabela");
  while($row = $resultado->fetch_array()){
      echo $row['area'];
  }

  ?>
