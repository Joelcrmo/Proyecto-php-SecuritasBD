                                                    --  T I P O S      E N U M E R A D O S--

CREATE TYPE ubicacion as ENUM(
  'Gran Canaria','Tenerife','Fuerteventura','Lanzarote','El Hierro','La Palma','La Gomera','La Graciosa'
);

CREATE TYPE estado AS ENUM(
    'Pendiente','Finalizado'
);

                                                   --  T I P O S      T A B L A S      A      U T I L I Z A R--


-- Table Tecnico--

Create TYPE tipo_tecnico AS(
  id_tecnico integer,
  nombre_tec character varying(50),
  telf_tec integer,
  ubicacion_tec ubicacion
);


CREATE SEQUENCE id_tecnico_seq;
CREATE TABLE tecnico of tipo_tecnico(
  id_tecnico default nextval('id_tecnico_seq')
);

ALTER TABLE tecnico ADD CONSTRAINT id_tecnico_unique UNIQUE (id_tecnico);


-- Table Trabajo--

Create TYPE tipo_trabajo AS(
  id_trabajo integer,
  tipo_tra character varying,
  ubicacion_tra ubicacion,
	id_tecnico integer
);

CREATE SEQUENCE id_trabajo_seq;
CREATE TABLE trabajo of tipo_trabajo(
  id_trabajo default nextval('id_trabajo_seq')
);

ALTER TABLE trabajo ADD CONSTRAINT id_trabajo_unique UNIQUE (id_trabajo);
 

-- Table Materiales--serial

Create Type tipo_materiales AS(
  id_material integer,
  tipo_mat character varying(100),
  ubicacion_mat ubicacion,
  id_tecnico integer
);

CREATE SEQUENCE id_material_seq;
CREATE TABLE materiales of tipo_materiales(
  id_material default nextval('id_material_seq')
);

ALTER TABLE materiales ADD CONSTRAINT id_material_unique UNIQUE (id_material);

 -- Table Subcontrata--

Create type tipo_subcontrata AS(
  id_subcontrata integer,
  nombre_sub character varying(45),
  telf_sub integer,
  ubicacion_sub ubicacion,
  trabajadores_sub integer,
  id_trabajo integer
);

CREATE SEQUENCE id_subcontrata_seq;
CREATE TABLE subcontrata of tipo_subcontrata(
  id_subcontrata default nextval('id_subcontrata_seq')
);

ALTER TABLE subcontrata ADD CONSTRAINT id_subcontrata_unique UNIQUE (id_subcontrata);


                                                   --    T A B L A S      Q U E      N O      S E      U T I L I Z A N--

-- Table Jefe--
CREATE TABLE Jefe (
  ID_jefe integer  PRIMARY KEY ,
  nombre_jefe character varying(45)  ,
  telf_jefe integer  ,
  ID_subcontrata integer REFERENCES subcontrata (ID_subcontrata) on delete cascade on update CASCADE
);
 

-- Table Coordinador--
CREATE TABLE Coordinador (
  ID_coordinador integer  PRIMARY KEY ,
  nombre_cor character varying(45)  ,
  telf_cor integer  ,
  ubicacion_cor character varying(45)  ,
  ID_tecnico integer REFERENCES tecnico (ID_tecnico) on delete cascade on update CASCADE
);


-- Table Administracion almacen--
CREATE TABLE Administracion_almacen (
  ID_admiAl integer  PRIMARY KEY ,
  nombre_adAl character varying(50)  ,
  telf_adAl integer  ,
  ubicacion_adAl character varying(45)
  );
 

-- Table Oficina--
CREATE TABLE Oficina (
  ID_oficina integer  PRIMARY KEY ,
  nombre_of character varying(45)  ,
  telf_of integer
  );
 

-- Table Localizacion--
CREATE TABLE Localizacion (
  ID_localizacion integer  PRIMARY KEY,
  ubicacion_loc character varying(45) 
);
 

-- Table Horario--
CREATE TABLE Horario (
  ID_horario integer  PRIMARY KEY ,
  personal integer  ,
  ID_trabajo integer REFERENCES trabajo (ID_trabajo) on delete cascade on update CASCADE 
  );
 

-- Table Administracion Oficina--
CREATE TABLE Administracion_Oficina (
  ID_admiOf integer  PRIMARY KEY ,
  nombre_adof character varying(45)  ,
  telf_adof integer  ,
  horario_adof FLOAT  ,
  ID_coordinador integer REFERENCES coordinador (ID_coordinador) on delete cascade on update CASCADE
  );
 

-- Table Cliente--
CREATE TABLE Cliente (
  ID_cliente integer   PRIMARY KEY,
  nombre_cli character varying(45)  ,
  telf_cli integer  ,
  ubicacion_cli character varying(45)  ,
  ID_admiOf integer REFERENCES Administracion_Oficina (ID_admiOf) on delete cascade on update CASCADE  
);
 
 -- Table Avisos--
CREATE TABLE Avisos (
  ID_avisos integer  PRIMARY KEY ,
  nombre_avs character varying(45)  ,
  cliente_avs character varying(45)  ,
  trabajo character varying(100)  ,
  ID_cliente integer REFERENCES cliente (ID_cliente) on delete cascade on update CASCADE  
);

-- Table Partes de trabajo--
CREATE TABLE Partes_de_trabajo (
  ID_parte integer  PRIMARY KEY,
  nombre_parte character varying(45)  ,
  localizacion character varying(45)  ,
  trabajo character varying(45)  ,
  material character varying(45)  ,
  viaje character varying(45)  ,
  avisos integer  ,
  tecnico character varying(45)  ,
  ID_avisos integer REFERENCES avisos (ID_avisos) on delete cascade on update CASCADE 
 );
 

-- Table Viajes--
CREATE TABLE Viajes (
  ID_viajes integer  PRIMARY KEY
);
 

-- Table Factura--
CREATE TABLE Factura (
  ID_factura integer  PRIMARY KEY ,
  tipo_fac character varying(200)  ,
  localizacion_fac character varying(45)  ,
  ID_cliente integer REFERENCES cliente (ID_cliente) on delete cascade on update CASCADE 
);
 

-- Table Encargado del cliente--
CREATE TABLE Encargado_del_cliente (
  ID_encargado integer  PRIMARY KEY ,
  nombre_enc character varying(45)  ,
  telf_enc integer  ,
  ubicacion_enc character varying(45)  ,
  ID_parte integer REFERENCES Partes_de_trabajo (ID_parte) on delete cascade on update CASCADE 
);
 

-- Table Proveedores--
CREATE TABLE Proveedores (
  ID_proveedores integer  PRIMARY KEY ,
  nombre_pro character varying(45)  ,
  telf_pro integer
  );
 

-- Table Distribuidores--
CREATE TABLE Distribuidores (
  ID_distribuidores integer  PRIMARY KEY ,
  nombre_dist character varying(45)  ,
  telf_dist integer
  );
 

-- Table Almacen--
CREATE TABLE Almacen (
  ID_almacen integer   PRIMARY KEY,
  nombre_alm character varying(45)  ,
  telf_alm integer  ,
  ubicacion_alm character varying(45)  ,
  ID_factura integer REFERENCES factura (ID_factura) on delete cascade on update CASCADE  
);

-- Table Vehiculo--
CREATE TABLE Vehiculo (
  ID_vehiculo integer   PRIMARY KEY,
  nombre_veh character varying(45)  ,
  tipo_veh character varying(45)  ,
  ID_admiAl integer REFERENCES Administracion_almacen (ID_admiAl) on delete cascade on update CASCADE  
);

-- Table Alquiler--
CREATE TABLE Alquiler (
  ID_alquiler integer  PRIMARY KEY ,
  nombre_alq character varying(45)  ,
  telf_alq integer  ,
  ubicacion_alq character varying(45)  ,
  ID_vehiculo integer REFERENCES vehiculo (ID_vehiculo) on delete cascade on update CASCADE  
);
 

-- Table Guardia--
CREATE TABLE Guardia (
  ID_guardia integer   PRIMARY KEY,
  horario_gua FLOAT  ,
  Tecnico_gua character varying(45)  ,
  ID_horario integer REFERENCES horario (ID_horario) on delete cascade on update CASCADE  ,
  ID_tecnico integer REFERENCES tecnico (ID_tecnico) on delete cascade on update CASCADE  
);


-- Table Tecnico_localizacion--
CREATE TABLE Tecnico_localizacion (
  ID_tecloc integer   PRIMARY KEY,
  ID_tecnico integer REFERENCES tecnico (ID_tecnico) on delete cascade on update CASCADE  ,
  ID_localizacion integer REFERENCES localizacion (ID_localizacion) on delete cascade on update CASCADE
);

-- Table Tenico_vehiculo--
CREATE TABLE Tecnico_vehiculo (
  ID_tecve integer   PRIMARY KEY,
  ID_tecnico integer REFERENCES tecnico (ID_tecnico) on delete cascade on update CASCADE  ,
  ID_vehiculo integer REFERENCES vehiculo (ID_vehiculo) on delete cascade on update CASCADE
);
 

-- Table Tecnico_parte--
CREATE TABLE Tecnico_parte (
  ID_tecpar integer   PRIMARY KEY,
  ID_tecnico integer REFERENCES tecnico (ID_tecnico) on delete cascade on update CASCADE   ,
  ID_parte integer REFERENCES Partes_de_trabajo (ID_parte) on delete cascade on update CASCADE 
);
 

-- Table Tecnico_aviso--
CREATE TABLE Tecnico_aviso (
  ID_tecav integer   PRIMARY KEY,
  ID_tecnico integer REFERENCES tecnico (ID_tecnico) on delete cascade on update CASCADE  ,
  ID_avisos integer REFERENCES avisos (ID_avisos) on delete cascade on update CASCADE
);
 

-- Table Jefe_coordinador--
CREATE TABLE Jefe_coordinador (
  ID_jefcor integer   PRIMARY KEY,
  ID_jefe integer REFERENCES jefe (ID_jefe) on delete cascade on update CASCADE  ,
  ID_coordinador integer REFERENCES coordinador (ID_coordinador) on delete cascade on update CASCADE
);
 

-- Table Coordinador_localizacion--
CREATE TABLE Coordinador_localizacion (
  ID_corloc integer   PRIMARY KEY,
  ID_coordinador integer REFERENCES coordinador (ID_coordinador) on delete cascade on update CASCADE  ,
  ID_localizacion integer REFERENCES localizacion (ID_localizacion) on delete cascade on update CASCADE
);
 

-- Table AdmiAl_material--
CREATE TABLE AdmiAl_material (
  ID_aDmat integer  PRIMARY KEY ,
  ID_admiAl integer REFERENCES Administracion_almacen (ID_admiAl) on delete cascade on update CASCADE  ,
  id_material integer REFERENCES materiales (id_material) on delete cascade on update CASCADE
);
 

-- Table Oficina_factura--
CREATE TABLE Oficina_factura (
  ID_offac integer  PRIMARY KEY ,
  ID_oficina integer REFERENCES Oficina (ID_Oficina) on delete cascade on update CASCADE  ,
  ID_factura integer REFERENCES factura (ID_factura) on delete cascade on update CASCADE
);
 

-- Table Localizacion_trabajo--
CREATE TABLE Localizacion_trabajo (
  ID_lotra integer  PRIMARY KEY ,
  ID_localizacion integer REFERENCES localizacion (ID_localizacion) on delete cascade on update CASCADE  ,
  ID_trabajo integer REFERENCES trabajo (ID_trabajo) on delete cascade on update CASCADE
);


-- Table Viajes_localizacion--
CREATE TABLE Viajes_localizacion (
  ID_vialoc integer  PRIMARY KEY ,
  ID_viajes integer REFERENCES viajes (ID_viajes) on delete cascade on update CASCADE  ,
  ID_localizacion integer REFERENCES localizacion (ID_localizacion) on delete cascade on update CASCADE  
); 


-- Table Material_almacen--
CREATE TABLE Material_almacen (
  ID_matalm integer   PRIMARY KEY,
  id_material integer REFERENCES materiales (id_material) on delete cascade on update CASCADE  ,
  ID_almacen integer REFERENCES almacen (ID_almacen) on delete cascade on update CASCADE  
);


-- Table Proveedor_material--
CREATE TABLE Proveedor_material (
  ID_promat integer  PRIMARY KEY ,
  ID_proveedores integer REFERENCES proveedores (ID_proveedores) on delete cascade on update CASCADE  ,
  id_material integer REFERENCES materiales (id_material) on delete cascade on update CASCADE  
);
 

-- Table Distribuidor_materiales--
CREATE TABLE Distribuidor_material (
  ID_distmat integer  PRIMARY KEY ,
  ID_distribuidores integer REFERENCES Distribuidores (ID_distribuidores) on delete cascade on update CASCADE  ,
  id_material integer REFERENCES materiales (id_material) on delete cascade on update CASCADE
);

-- Table Avisos_trabajo--
CREATE TABLE Aviso_trabajo (
  ID_avitra integer   PRIMARY KEY,
  ID_avisos integer REFERENCES Avisos (ID_avisos) on delete cascade on update CASCADE ,
  ID_trabajo integer REFERENCES trabajo (ID_trabajo) on delete cascade on update CASCADE
);
 
--------------------------------------------------------------------------TECNICO--------------------------------------------------------------------------

                                                            -- Obtener listado tecnico --
 
 CREATE OR REPLACE FUNCTION sp_obtenerListadoTecnicos(
	)
    RETURNS SETOF tecnico 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM tecnico;
    END;
$BODY$;

                                                              -- Añadir Tecnico --

CREATE OR REPLACE PROCEDURE insertarTecnico(
    pnombre_tec CHARACTER VARYING(100),
    ptelf_tec INTEGER,
    pubicacion_tec ubicacion
)
LANGUAGE plpgsql
AS $BODY$
BEGIN 
      INSERT INTO tecnico (nombre_tec, telf_tec, ubicacion_tec)
      VALUES (pnombre_tec, ptelf_tec, pubicacion_tec);
END
$BODY$

                                                              -- Borrar Tecnico --
CREATE OR REPLACE PROCEDURE borrartecnico(
    _id_tecnico INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN
    UPDATE trabajo SET id_tecnico = NULL WHERE id_tecnico = _id_tecnico;
    UPDATE materiales SET id_tecnico = NULL WHERE id_tecnico = _id_tecnico;
    DELETE FROM tecnico WHERE id_tecnico = _id_tecnico;

    END;
  $BODY$

                                                              -- Editar Tecnico --
CREATE OR REPLACE FUNCTION obtenertecnico(
     _id_tecnico integer
	)
    RETURNS SETOF tecnico
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM tecnico where id_tecnico =_id_tecnico;
    END;
$BODY$;

CREATE OR REPLACE PROCEDURE actualizar_tecnico(
    _pid_tecnico integer,
    _pnombre_tec character varying(100), 
    _ptelf_tec INTEGER, 
    _pubicacion_tec character varying(100)
)
LANGUAGE plpgsql
AS $BODY$
BEGIN
    UPDATE tecnico set nombre_tec=_pnombre_tec, telf_tec=_ptelf_tec, ubicacion_tec=_ubicacion_tec
    WHERE id_tecnico =_pid_tecnico;
END
$BODY$;

--------------------------------------------------------------------------TRABAJO--------------------------------------------------------------------------

                                                             -- Obtener listado Trabajo --

CREATE OR REPLACE FUNCTION sp_obtenerListadoTrabajo(
	)
    RETURNS SETOF trabajo 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM trabajo;
    END;
$BODY$;

                                                              -- Añadir Trabajo --
CREATE OR REPLACE PROCEDURE insertarTrabajo(
    ptipo_tra CHARACTER VARYING,
    pubicacion_tra ubicacion,
    pid_tecnico INTEGER
)
    LANGUAGE plpgsql
    AS $BODY$
BEGIN
    INSERT INTO Trabajo (tipo_tra, ubicacion_tra, id_tecnico)
    VALUES (ptipo_tra, pubicacion_tra, pid_tecnico);
END
$BODY$;

                                                              -- Borrar Trabajo --
CREATE OR REPLACE PROCEDURE borrartrabajo(
    _id_trabajo INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN
    UPDATE subcontrata SET id_trabajo = NULL WHERE id_trabajo = _id_trabajo; 
    DELETE FROM trabajo WHERE id_trabajo = _id_trabajo;

    END;
  $BODY$

                                                              -- Editar Trabajo --
CREATE OR REPLACE FUNCTION obtenertrabajo(
     _id_trabajo INTEGER
	)
    RETURNS SETOF trabajo
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM trabajo where id_trabajo =_id_trabajo;
    END;
$BODY$;

--------------------------------------------------------------------------MATERIALES--------------------------------------------------------------------------

                                                             -- Obtener listado Materiales --

CREATE OR REPLACE FUNCTION sp_obtenerListadoMateriales(
	)
    RETURNS SETOF materiales 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM materiales;
    END;
$BODY$;

                                                              -- Añadir Materiales --
CREATE OR REPLACE PROCEDURE insertarmateriales(
    ptipo_mat CHARACTER VARYING,
    pubicacion_mat ubicacion,
    pid_tecnico INTEGER
)
    LANGUAGE plpgsql
    AS $BODY$
BEGIN
    INSERT INTO materiales (tipo_mat, ubicacion_mat, id_tecnico)
    VALUES (ptipo_mat, pubicacion_mat, pid_tecnico);
END
$BODY$;

                                                              -- Borrar Materiales --
CREATE OR REPLACE PROCEDURE borrarmateriales(
    _id_material INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN

    DELETE FROM materiales WHERE id_material = _id_material;

    END;
  $BODY$

                                                              -- Editar Materiales --
CREATE OR REPLACE FUNCTION obtenermateriales(
     _id_material INTEGER
	)
    RETURNS SETOF materiales
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM materiales where id_material =_id_material;
    END;
$BODY$;

--------------------------------------------------------------------------SUBCONTRATA--------------------------------------------------------------------------

                                                              -- Obtener listado Subcontrata --

  CREATE OR REPLACE FUNCTION sp_obtenerListadoSubcontrata(
	)
    RETURNS SETOF subcontrata 
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM subcontrata;
    END;
$BODY$;

                                                              -- Añadir Subcontrata --
CREATE OR REPLACE PROCEDURE insertarSubcontrata(
    pnombre_sub CHARACTER VARYING,
    ptelf_sub INTEGER,
    pubicacion_sub ubicacion,
    ptrabajadores_sub INTEGER,
    pid_trabajo INTEGER
)
    LANGUAGE plpgsql
    AS $BODY$
BEGIN
    INSERT INTO subcontrata (nombre_sub, telf_sub, ubicacion_sub, trabajadores_sub, id_trabajo)
    VALUES (pnombre_sub, ptelf_sub, pubicacion_sub, ptrabajadores_sub, pid_trabajo);
END
$BODY$;

                                                              -- Borrar Subcontrata --
CREATE OR REPLACE PROCEDURE borrarSubcontrata(
    _id_subcontrata INTEGER
)
LANGUAGE plpgsql
AS $BODY$
  BEGIN

    DELETE FROM subcontrata WHERE id_subcontrata = _id_subcontrata;

    END;
  $BODY$

                                                              -- Editar Subcontrata --
CREATE OR REPLACE FUNCTION obtenerSubcontrata(
     _id_subcontrata INTEGER
	)
    RETURNS SETOF subcontrata
    LANGUAGE 'plpgsql'
AS $BODY$
    BEGIN
        RETURN QUERY SELECT * FROM subcontrata where id_subcontrata =_id_subcontrata;
    END;
$BODY$;
