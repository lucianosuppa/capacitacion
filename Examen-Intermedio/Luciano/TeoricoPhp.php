<?php
 
/**
 * Se les presentan varias preguntas teoricas sobre los temas
 * vistos durante el curso. Responda con una X entre los [ ] en
 * las preguntas multiple choices y donde deba desarrollar escriba
 * dentro los comentarios.
 */
 
/**
 * 1 - MongoDB / Elastic search son:
 *
 * [ ] - Base de datos relacionales
 * [X] - Base de datos no relacional
 * [ ] - Un sistema de documentos
 */
 
/**
 * 2 - MongoDB - Marque todas las que corresponda:
 *
 * [ ] - Guarda documentos con una estructura rigida de información
 * [X] - Guarda documentos sin estructura rigida
 * [X] - Se puede guardar documentos en grupos de documentos o collecciones
 * [X] - Nos podemos comunicar con MongoDB por medio de JSON
 */
 
/**
 * 3 - Patrones de diseño. Explique MVC, de un ejemplo de las actividades donde
 *     hicimos uso de este patron. Comente los componentes principales
 *     de la actividad
 * 
 *      El MVC es el patron Modelo,Vista,Controlador. 
 *      El Modelo se encarga de guardar y recupera la información
 *      ya sea una base de datos, ficheros de texto, XML, etc.
 *      La vista es lo que el usuario la pueda visualizar.
 *      El Controlador es el que pide al modelo la información necesaria e 
 *      invoca a la plantilla(de la vista) que corresponda para que la información sea presentada.
 * 
 *      M odelo (informacion que mis aplicaciones utilizan) 
 *	        datos (db, cache)
 *	        filesystem (leer, copiar, mover archivos / directorios)
 *
 *       V ista
 *	        templates (generadores de codigo html)
 *
 *       C ontrolador (listado de solicitud - entrega de lo solicitado)
 *	        routing
 *	        comunicacion HTTP(request, response)	
 *   	    Validacion
 * 
 *      Este patron lo utilizamos en una actividad donde creamos un framework. los principales componentes
 *      que implementamos es un router y un controller.
 */
 
 /**
 * 4 - Patrones de diseño. De un ejemplo practico de cada uno de Decorator y Composite.
 *
 *      El patrón de diseño Decorator nos permite modificar, retirar o agregar responsabilidades a un objeto dinámicamente. 
 *      las funcionalidades se modifican/agregan/retiran durante la ejecución del script o aplicación.
 *      En el curso aplicamos un decorador a un programa que implementaba una billetera donde agregaba, sacaba billetes y 
 *      los mostraba. mediante el decorador pudimos hacer que esa billetera muestre el monto total convertido a dolares sin
 *      modificar la clase original.
 *      
 *      El patrón Composite nos permite componer objetos de manera recursiva en una estructura de árbol en la cual cada 
 *      objeto individual o grupo de objetos puede ser tratado de la misma manera dado que todos compartirán la misma interfaz 
 *      base. 
 *      Durante las clases implementamos una caja que tenia cierta capacidad, donde uno podia poner objetos o no, dependiendo 
 *      si la capacidad lo permitia, con el patron Composite pudimos guardar o meter una caja dentro de otra caja.
 */