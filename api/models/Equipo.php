<?php

Class Equipo{
    private connection $connection;
    private response $response;

    public function __construct(Connection $connection, Response $response)
    {
        $this->connection = $connection;
        $this->response = $response;
    }
    function getAll()
    {
        $query = "SELECT * FROM vwEquipo";
        $statement = $this->connection->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $this->response->success("Equipos obtenidos correctamente", $result, 1);
    }
    function add($arrayData){
        $Codigo = $arrayData['codigo'];
        $Categoria = $arrayData['categoria'];
        $Ubicacion = $arrayData['ubicacion'];
        $Estado = $arrayData['estado'];
        $Marca = $arrayData['marca'];
        $Modelo = $arrayData['modelo'];
        $Serie = $arrayData['serie'];
        $Descripcion = $arrayData['descripcion'];
        $Imagen = $arrayData['imagen']; 

        $query = "INSERT INTO Equipo (Codigo_Equipo, Id_Categoria, Id_Ubicacion, 
        Id_Estado_Equipo, Marca_Equipo, Modelo_Equipo, Serie_Equipo, Descripcion_Equipo, 
        Imagen_Equipo) 
        VALUES (:codigo, :categoria, :ubicacion, :estado, :marca, :modelo, :serie, :descripcion, :imagen)";
        $Statement = $this->connection->prepare($query);
        $Statement->execute([
            'codigo' => $Codigo,
            'categoria' => $Categoria,
            'ubicacion' => $Ubicacion,
            'estado' => $Estado,
            'marca' => $Marca,
            'modelo' => $Modelo,
            'serie' => $Serie,
            'descripcion' => $Descripcion,
            'imagen' => $Imagen
        ]);
        $this->response->success("Equipo agregado correctamente", [], 1);
    }
    function update($arrayData){
        $Id_Equipo = $arrayData['id_equipo'];
        $Codigo = $arrayData['codigo'];
        $Categoria = $arrayData['categoria'];
        $Ubicacion = $arrayData['ubicacion'];
        $Estado = $arrayData['estado'];
        $Marca = $arrayData['marca'];
        $Modelo = $arrayData['modelo'];
        $Serie = $arrayData['serie'];
        $Descripcion = $arrayData['descripcion'];
        $Imagen = $arrayData['imagen']; 

        $query = "UPDATE Equipo SET Codigo_Equipo=:codigo, Id_Categoria=:categoria, Id_Ubicacion=:ubicacion, 
        Id_Estado_Equipo=:estado, Marca_Equipo=:marca, Modelo_Equipo=:modelo, Serie_Equipo=:serie, Descripcion_Equipo=:descripcion, 
        Imagen_Equipo=:imagen WHERE Id_Equipo=:id_equipo";
        $Statement = $this->connection->prepare($query);
        $Statement->execute([
            'id_equipo' => $Id_Equipo,
            'codigo' => $Codigo,
            'categoria' => $Categoria,
            'ubicacion' => $Ubicacion,
            'estado' => $Estado,
            'marca' => $Marca,
            'modelo' => $Modelo,
            'serie' => $Serie,
            'descripcion' => $Descripcion,
            'imagen' => $Imagen
        ]);
        if($Statement->rowCount() > 0){
            $this->response->success("Equipo actualizado correctamente", [], 1);
        }else{
            throw new Exception("No se pudo actualizar el equipo");
        }
    }
}