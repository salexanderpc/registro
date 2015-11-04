CREATE TABLE medicos (
  id SERIAL  NOT NULL ,
  nombre_medico TEXT      ,
PRIMARY KEY(id));




CREATE TABLE paciente (
  id SERIAL  NOT NULL ,
  nombre TEXT      ,
PRIMARY KEY(id));




CREATE TABLE transaccion (
  id SERIAL  NOT NULL ,
  tipo_transaccion TEXT      ,
PRIMARY KEY(id));




CREATE TABLE especialidades (
  id SERIAL  NOT NULL ,
  nombre_especialidad TEXT      ,
PRIMARY KEY(id));




CREATE TABLE medicamento (
  id SERIAL  NOT NULL ,
  nombre_medicamento TEXT      ,
PRIMARY KEY(id));




CREATE TABLE expediente (
  id SERIAL  NOT NULL ,
  paciente_id INTEGER   NOT NULL ,
  numero_expediente TEXT      ,
PRIMARY KEY(id)  ,
  FOREIGN KEY(paciente_id)
    REFERENCES paciente(id));


CREATE INDEX expediente_FKIndex1 ON expediente (paciente_id);


CREATE INDEX IFK_Rel_01 ON expediente (paciente_id);


CREATE TABLE recetas (
  id SERIAL  NOT NULL ,
  transaccion_id INTEGER   NOT NULL ,
  especialidades_id INTEGER   NOT NULL ,
  medicamento_id INTEGER   NOT NULL ,
  medicos_id INTEGER   NOT NULL ,
  expediente_id INTEGER   NOT NULL ,
  fecha_programada DATE    ,
  cantidad INTEGER    ,
  recepcion BOOL    ,
  despacho BOOL    ,
  fecha_retiro TIMESTAMP      ,
PRIMARY KEY(id)          ,
  FOREIGN KEY(expediente_id)
    REFERENCES expediente(id),
  FOREIGN KEY(medicos_id)
    REFERENCES medicos(id),
  FOREIGN KEY(medicamento_id)
    REFERENCES medicamento(id),
  FOREIGN KEY(especialidades_id)
    REFERENCES especialidades(id),
  FOREIGN KEY(transaccion_id)
    REFERENCES transaccion(id));


CREATE INDEX recetas_FKIndex1 ON recetas (expediente_id);
CREATE INDEX recetas_FKIndex2 ON recetas (medicos_id);
CREATE INDEX recetas_FKIndex3 ON recetas (medicamento_id);
CREATE INDEX recetas_FKIndex4 ON recetas (especialidades_id);
CREATE INDEX recetas_FKIndex5 ON recetas (transaccion_id);


CREATE INDEX IFK_Rel_02 ON recetas (expediente_id);
CREATE INDEX IFK_Rel_03 ON recetas (medicos_id);
CREATE INDEX IFK_Rel_04 ON recetas (medicamento_id);
CREATE INDEX IFK_Rel_05 ON recetas (especialidades_id);
CREATE INDEX IFK_Rel_06 ON recetas (transaccion_id);



