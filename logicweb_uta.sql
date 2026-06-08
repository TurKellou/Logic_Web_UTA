-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2026 a las 12:35:16
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `logicweb_uta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE `ejercicio` (
  `IdEjercicio` int(11) NOT NULL,
  `Titulo` varchar(200) NOT NULL,
  `Enunciado` text NOT NULL,
  `Categoria` varchar(100) DEFAULT NULL,
  `Dificultad` enum('Básica','Intermedia','Avanzada') DEFAULT 'Básica',
  `SolucionEsperada` text DEFAULT NULL,
  `LineasPseudocodigo` text DEFAULT NULL,
  `IdTema` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`IdEjercicio`, `Titulo`, `Enunciado`, `Categoria`, `Dificultad`, `SolucionEsperada`, `LineasPseudocodigo`, `IdTema`) VALUES
(1, 'POO: Instanciar un Objeto (Java)', 'Ordena las líneas de código lógico para crear una clase \"Persona\" e instanciar un objeto a partir de ella.', 'POO', 'Básica', '<h5>Solución Java</h5><pre><code>class Persona { }\nPersona p = new Persona();\np.nombre = \"Juan\";</code></pre>', 'class Persona { }|Persona p = new Persona();|p.nombre = \"Juan\";', 2),
(2, 'Archivos: Abrir y Escribir (C++)', 'Ordena la sintaxis básica en C++ para incluir la librería, abrir un archivo de texto, escribir en él y cerrarlo.', 'Archivos', 'Intermedia', '<h5>Solución C++</h5><pre><code>#include &lt;fstream&gt;\nstd::ofstream archivo(\"datos.txt\");\narchivo &lt;&lt; \"Hola Mundo\";\narchivo.close();</code></pre>', '#include <fstream>|std::ofstream archivo(\"datos.txt\");|archivo << \"Hola Mundo\";|archivo.close();', 3),
(3, 'Arreglos: Sumar Elementos (Java)', 'Ordena las líneas de código en Java para declarar un arreglo, inicializar una variable suma, iterar con un bucle foreach e imprimir el resultado.', 'Arreglos', 'Básica', '<h5>Solución Java</h5><pre><code>int[] numeros = {10, 20, 30};\nint suma = 0;\nfor(int n : numeros) { suma += n; }\nSystem.out.println(suma);</code></pre>', 'int[] numeros = {10, 20, 30};|int suma = 0;|for(int n : numeros) { suma += n; }|System.out.println(suma);', 1),
(4, 'Listas: Agregar Elementos (C++)', 'Ordena la sintaxis en C++ para incluir la librería de listas, instanciar una lista de enteros y agregarle dos elementos al final.', 'LinkedList', 'Avanzada', '<h5>Solución C++</h5><pre><code>#include &lt;list&gt;\nstd::list&lt;int&gt; miLista;\nmiLista.push_back(10);\nmiLista.push_back(20);</code></pre>', '#include <list>|std::list<int> miLista;|miLista.push_back(10);|miLista.push_back(20);', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intento`
--

CREATE TABLE `intento` (
  `IdIntento` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `IdEjercicio` int(11) DEFAULT NULL,
  `RespuestaUsuario` text NOT NULL,
  `Resultado` tinyint(1) NOT NULL,
  `Fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `intento`
--

INSERT INTO `intento` (`IdIntento`, `IdUsuario`, `IdEjercicio`, `RespuestaUsuario`, `Resultado`, `Fecha`) VALUES
(26, 1, 1, 'class Persona { }|Persona p = new Persona();|p.nombre = \"Juan\";', 1, '2026-06-08 00:16:59'),
(27, 1, 2, 'archivo << \"Hola Mundo\";|std::ofstream archivo(\"datos.txt\");|archivo.close();|#include <fstream>', 0, '2026-06-08 00:17:10'),
(28, 1, 2, '#include <fstream>|std::ofstream archivo(\"datos.txt\");|archivo << \"Hola Mundo\";|archivo.close();', 1, '2026-06-08 00:17:20'),
(29, 1, 4, 'Dato: 5', 1, '2026-06-08 00:44:11'),
(30, 1, 4, 'Dato: 4', 0, '2026-06-08 00:44:23'),
(31, 1, 2, 'Dato: 80', 1, '2026-06-08 00:44:50'),
(32, 1, 2, 'Dato: 60', 0, '2026-06-08 00:44:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retroalimentacion`
--

CREATE TABLE `retroalimentacion` (
  `IdRetroalimentacion` int(11) NOT NULL,
  `IdEjercicio` int(11) DEFAULT NULL,
  `MensajeCorrecto` text NOT NULL,
  `MensajeError` text NOT NULL,
  `Recomendacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `IdTema` int(11) NOT NULL,
  `NombreTema` varchar(150) NOT NULL,
  `Descripcion` text DEFAULT NULL,
  `Unidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`IdTema`, `NombreTema`, `Descripcion`, `Unidad`) VALUES
(1, 'Arreglos (Arrays) en C++ y Java', '<h3>Estructuras Estáticas</h3><p>Un arreglo es una estructura de datos que almacena una colección de elementos del mismo tipo en posiciones de memoria contiguas.</p>', 'U1'),
(2, 'Programación Orientada a Objetos (POO)', '<h3>Clases y Objetos</h3><p>La POO se basa en el concepto de \"objetos\". Una <strong>Clase</strong> es el molde, y el <strong>Objeto</strong> es la instancia de esa clase. Aquí veremos la sintaxis básica para instanciar objetos.</p>', 'U2'),
(3, 'Manejo de Archivos', '<h3>Lectura y Escritura</h3><p>Aprenderemos cómo los lenguajes se comunican con el sistema operativo para abrir, leer, escribir y cerrar archivos de texto de forma segura.</p>', 'U3'),
(4, 'Listas Enlazadas (LinkedList)', '<h3>Estructuras Dinámicas</h3><p>A diferencia de los arreglos, las LinkedList no requieren posiciones de memoria contiguas, permitiendo un manejo de datos dinámico mucho más flexible.</p>', 'U4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasena` varchar(255) NOT NULL,
  `Rol` enum('Estudiante','Docente','Administrador') DEFAULT 'Estudiante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `Nombre`, `Correo`, `Contrasena`, `Rol`) VALUES
(1, 'Admin UTA', 'admin@uta.edu.ec', '123456', 'Administrador'),
(2, 'Estudiante Prueba', 'estudiante@uta.edu.ec', '123456', 'Estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD PRIMARY KEY (`IdEjercicio`),
  ADD KEY `FK_Ejercicio_Tema` (`IdTema`);

--
-- Indices de la tabla `intento`
--
ALTER TABLE `intento`
  ADD PRIMARY KEY (`IdIntento`),
  ADD KEY `FK_Intento_Usuario` (`IdUsuario`),
  ADD KEY `FK_Intento_Ejercicio` (`IdEjercicio`);

--
-- Indices de la tabla `retroalimentacion`
--
ALTER TABLE `retroalimentacion`
  ADD PRIMARY KEY (`IdRetroalimentacion`),
  ADD UNIQUE KEY `IdEjercicio` (`IdEjercicio`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`IdTema`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD UNIQUE KEY `Correo` (`Correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  MODIFY `IdEjercicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `intento`
--
ALTER TABLE `intento`
  MODIFY `IdIntento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `retroalimentacion`
--
ALTER TABLE `retroalimentacion`
  MODIFY `IdRetroalimentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `IdTema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ejercicio`
--
ALTER TABLE `ejercicio`
  ADD CONSTRAINT `FK_Ejercicio_Tema` FOREIGN KEY (`IdTema`) REFERENCES `tema` (`IdTema`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intento`
--
ALTER TABLE `intento`
  ADD CONSTRAINT `FK_Intento_Ejercicio` FOREIGN KEY (`IdEjercicio`) REFERENCES `ejercicio` (`IdEjercicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Intento_Usuario` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `retroalimentacion`
--
ALTER TABLE `retroalimentacion`
  ADD CONSTRAINT `FK_Retro_Ejercicio` FOREIGN KEY (`IdEjercicio`) REFERENCES `ejercicio` (`IdEjercicio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
