# 7.API_restful_js_Oauth2.0_testing

# Ejemplo de Aplicación con Bootstrap, JavaScript y POO en PHP

Este proyecto es un ejemplo práctico que combina **Bootstrap**, **JavaScript** y **Programación Orientada a Objetos (POO) en PHP** para la gestión de usuarios con autenticación mediante **tokens de acceso**.

Puedes encontrar la teoría utilizada en este ejemplo en el siguiente enlace:
> <a href="https://docs.google.com/document/d/1lhBlLzDBTsm5zI9kWFjIm0B3sWAmhhWgpqg-IGfepcA/edit?tab=t.0#heading=h.7qu730h0wku2" target="_blank">Guia PHP</a>

---

## 📦 Tecnologías utilizadas
- <a href="https://docs.google.com/document/d/1lhBlLzDBTsm5zI9kWFjIm0B3sWAmhhWgpqg-IGfepcA/edit?tab=t.0#heading=h.jxadv55jyth" target="_blank">**Bootstrap** para el diseño responsivo.
- <a href="https://docs.google.com/document/d/1lhBlLzDBTsm5zI9kWFjIm0B3sWAmhhWgpqg-IGfepcA/edit?tab=t.0#heading=h.xl3ce7m9tn28" target="_blank">**JavaScript** para la interacción dinámica en el lado del cliente.
- **PHP (POO)** para la lógica del servidor.
- **MySQL** para la persistencia de datos.

---

## 🗄️ Base de datos utilizada

A continuación, la estructura SQL de la base de datos:

```sql
CREATE DATABASE IF NOT EXISTS base_usuarios;

CREATE TABLE IF NOT EXISTS base_usuarios.usuario (
  id INT(11) NOT NULL AUTO_INCREMENT,
  usr_name VARCHAR(100) NOT NULL,
  usr_email VARCHAR(100) UNIQUE NOT NULL,
  usr_pass VARCHAR(100) NOT NULL,
  imagen VARCHAR(100) DEFAULT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS base_usuarios.access_token (
  token CHAR(32) NOT NULL,
  id_usuario INT(11) NOT NULL,
  fecha_creado DATETIME NOT NULL DEFAULT NOW(),
  fecha_vencimiento DATETIME NOT NULL DEFAULT (NOW() + INTERVAL 12 HOUR),
  PRIMARY KEY (token),
  FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);
