<?php
/* Clase usuario para gestionar con API RESTful
 * Permite operaciones CRUD (Crear, Leer, Actualizar, Eliminar)
 * Requiere conexión a una base de datos MySQL
 */

// Configuracion del reporte de errores
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', 0);

class Test
{
	private $conn;

	// Constructor que recibe la conexión a la base de datos
	public function __construct($conn)
	{
		$this->conn = $conn;
	}

	// Métodos de prueba
	// Verifica si el token es correcto
	public function testKey($key)
	{
		// verifico si el token existe y esta vencido
		$query = "SELECT * FROM access_token WHERE token = '$key' AND fecha_vencimiento > NOW()";
		$result = mysqli_query($this->conn, $query);
		if(mysqli_num_rows($result) > 0){
			http_response_code(200);
			return json_encode(["success" => "Token válido"]);
		} else {
			http_response_code(400);
			return json_encode(["error" => "Token inválido o expirado"]);
		}
	}
}