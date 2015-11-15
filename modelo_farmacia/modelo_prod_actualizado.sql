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




CREATE TABLE medicamento (
  id SERIAL  NOT NULL ,
  nombre_medicamento TEXT      ,
PRIMARY KEY(id));




CREATE TABLE especialidades (
  id SERIAL  NOT NULL ,
  nombre_especialidad TEXT      ,
PRIMARY KEY(id));




CREATE TABLE expediente (
  id SERIAL  NOT NULL ,
  paciente_id INTEGER   NOT NULL ,
  numero_expediente VARCHAR(12)      ,
PRIMARY KEY(id)  ,
  FOREIGN KEY(paciente_id)
    REFERENCES paciente(id));


CREATE INDEX expediente_FKIndex1 ON expediente (paciente_id);


CREATE INDEX IFK_Rel_02 ON expediente (paciente_id);


CREATE TABLE desc_recetas (
  id SERIAL  NOT NULL ,
  transaccion_id INTEGER   NOT NULL ,
  expediente_id INTEGER   NOT NULL ,
  especialidades_id INTEGER   NOT NULL ,
  medicos_id INTEGER   NOT NULL ,
  fecha_programada DATE      ,
PRIMARY KEY(id)        ,
  FOREIGN KEY(medicos_id)
    REFERENCES medicos(id),
  FOREIGN KEY(especialidades_id)
    REFERENCES especialidades(id),
  FOREIGN KEY(expediente_id)
    REFERENCES expediente(id),
  FOREIGN KEY(transaccion_id)
    REFERENCES transaccion(id));


CREATE INDEX recetas_programadas_FKIndex1 ON desc_recetas (medicos_id);
CREATE INDEX recetas_programadas_FKIndex2 ON desc_recetas (especialidades_id);
CREATE INDEX recetas_programadas_FKIndex3 ON desc_recetas (expediente_id);
CREATE INDEX desc_recetas_FKIndex4 ON desc_recetas (transaccion_id);


CREATE INDEX IFK_Rel_07 ON desc_recetas (medicos_id);
CREATE INDEX IFK_Rel_08 ON desc_recetas (especialidades_id);
CREATE INDEX IFK_Rel_09 ON desc_recetas (expediente_id);
CREATE INDEX IFK_Rel_09 ON desc_recetas (transaccion_id);


CREATE TABLE recetas_programadas (
  id SERIAL  NOT NULL ,
  transaccion_id INTEGER   NOT NULL ,
  desc_recetas_id INTEGER   NOT NULL ,
  medicamento_id INTEGER   NOT NULL ,
  cantidad INTEGER    ,
  recepcion BOOL    ,
  despacho BOOL    ,
  fecha_retiro TIMESTAMP      ,
PRIMARY KEY(id)      ,
  FOREIGN KEY(medicamento_id)
    REFERENCES medicamento(id),
  FOREIGN KEY(desc_recetas_id)
    REFERENCES desc_recetas(id),
  FOREIGN KEY(transaccion_id)
    REFERENCES transaccion(id));


CREATE INDEX recetas_FKIndex3 ON recetas_programadas (medicamento_id);
CREATE INDEX recetas_FKIndex2 ON recetas_programadas (desc_recetas_id);
CREATE INDEX recetas_programadas_FKIndex3 ON recetas_programadas (transaccion_id);


CREATE INDEX IFK_Rel_05 ON recetas_programadas (medicamento_id);
CREATE INDEX IFK_Rel_10 ON recetas_programadas (desc_recetas_id);
CREATE INDEX IFK_Rel_07 ON recetas_programadas (transaccion_id);



