--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: especialidades; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE especialidades (
    id integer NOT NULL,
    nombre_especialidad text
);


ALTER TABLE especialidades OWNER TO atf;

--
-- Name: especialidades_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE especialidades_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE especialidades_id_seq OWNER TO atf;

--
-- Name: especialidades_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE especialidades_id_seq OWNED BY especialidades.id;


--
-- Name: expediente; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE expediente (
    id integer NOT NULL,
    paciente_id integer NOT NULL,
    numero_expediente text
);


ALTER TABLE expediente OWNER TO atf;

--
-- Name: expediente_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE expediente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE expediente_id_seq OWNER TO atf;

--
-- Name: expediente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE expediente_id_seq OWNED BY expediente.id;


--
-- Name: medicamento; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE medicamento (
    id integer NOT NULL,
    nombre_medicamento text
);


ALTER TABLE medicamento OWNER TO atf;

--
-- Name: medicamento_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE medicamento_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE medicamento_id_seq OWNER TO atf;

--
-- Name: medicamento_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE medicamento_id_seq OWNED BY medicamento.id;


--
-- Name: medicos; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE medicos (
    id integer NOT NULL,
    nombre_medico text
);


ALTER TABLE medicos OWNER TO atf;

--
-- Name: medicos_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE medicos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE medicos_id_seq OWNER TO atf;

--
-- Name: medicos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE medicos_id_seq OWNED BY medicos.id;


--
-- Name: paciente; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE paciente (
    id integer NOT NULL,
    nombre text
);


ALTER TABLE paciente OWNER TO atf;

--
-- Name: paciente_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE paciente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_id_seq OWNER TO atf;

--
-- Name: paciente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE paciente_id_seq OWNED BY paciente.id;


--
-- Name: recetas; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE recetas (
    id integer NOT NULL,
    especialidades_id integer NOT NULL,
    medicamento_id integer NOT NULL,
    medicos_id integer NOT NULL,
    expediente_id integer NOT NULL,
    fecha_programada date,
    cantidad integer,
    recepcion boolean,
    despacho boolean,
    fecha_retiro timestamp without time zone
);


ALTER TABLE recetas OWNER TO atf;

--
-- Name: recetas_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE recetas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE recetas_id_seq OWNER TO atf;

--
-- Name: recetas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE recetas_id_seq OWNED BY recetas.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY especialidades ALTER COLUMN id SET DEFAULT nextval('especialidades_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY expediente ALTER COLUMN id SET DEFAULT nextval('expediente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY medicamento ALTER COLUMN id SET DEFAULT nextval('medicamento_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY medicos ALTER COLUMN id SET DEFAULT nextval('medicos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY paciente ALTER COLUMN id SET DEFAULT nextval('paciente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY recetas ALTER COLUMN id SET DEFAULT nextval('recetas_id_seq'::regclass);


--
-- Data for Name: especialidades; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY especialidades (id, nombre_especialidad) FROM stdin;
1	ESPECIALIDAD 1
2	ESPECIALIDAD 2
4	Medicina
5	Ginecobstetricia
6	Pediatría
7	Odontología
8	Servicios de Diagnóstico y Apoyo
9	Otras Atenciones Consulta Externa Médica
10	Medicina General
11	Medicina Interna
12	Dermatología
13	Endocrinología
14	Nefrología
15	Neurología
16	Cardiología
17	Neumología
18	Gastroenterología
19	Hematología
20	Oncología
21	Reumatología
22	Nutriología
23	CENid
24	Psiquiatría
25	Anestesiología
26	Ortopedia
27	Neurocirugía
28	Oftalmología
29	Otorrinolaringología
30	Urología
31	Cirugía Plástica
32	Proctología
33	Cirugía de Tórax
34	Cirugía Maxilofacial
35	Cirugía Cardiovascular
36	Cirugía Oncológica
37	Ginecología
38	Clínica de Mamas
39	Infertilidad
40	Uroginecología
41	Cirugía Ginecológica
42	Emergencia Ginecológica
43	Detección de Embarazo de Alto Riesgo
44	Embarazo de Alto Riesgo
45	Perinatología
46	Puerperio
47	Cirugía Obstetricia
48	Emergencia Obstétrica
49	Neonatología
50	Medicina Pediátrica
51	Cirugía Pediátrica
52	Cirugía Neonatal
53	Pediatría General
54	Neurología Pediátrica
55	Cardiología Pediátrica
56	Neumología Pediátrica
57	Dermatología Pediátrica
58	Hematología pediátrica
59	Urología pediátrica
60	Nefrología pediátrica
61	Endocrinología Pediátrica
62	Fisiatria Pediátrica
63	Gastroenterología Pediátrica
64	Nutriología Pediátrica
65	Reumatología Pediátrica
66	Cirugía Plástica Pediátrica
67	Cirugía Cardiovascular Pediátrica
68	Cirugía Maxilofacial Pediátrica
69	Cirugía Oncológica Pediátrica
70	Neurocirugía Pediátrica
71	Oftalmología Pediátrica
72	Oncología Pediátrica
73	Ortopedia Pediátrica
74	Otorrinolaringología Pediátrica
75	Cirugía Oral
76	Medicina Nuclear
77	Patología
78	Medicina Física
79	Fisiatría
80	Genética
81	Banco sangre
82	Banco de leche
83	Clínica de Ulceras
84	Medicina Familiar
85	Nutrición
86	Programa de Atención Integral
87	Psicología
88	Selección
89	Unidades del dolor y cuidados paliativos
90	Laboratorio Clínico
91	Imagenología
92	Referido Externo
93	Farmacia
94	Cirugía Vascular
95	Traumatología-Ortopedica
96	Colposcopía
97	Endoscopía
98	Infectología
99	Obstetricia
100	Alergología
101	Cirugía Endoscópica
102	Clínica de cesación de consumo de tabaco
103	Atención Materno Infantil
104	Cirugía
105	Cirugía General
106	Planificación Familiar
107	Adolescencia
108	Clínica VICITS
109	Clínica TAR
110	Programa VIH
111	Programa Nacional de Tuberculosis y Enfermedades Respiratorias
112	Adulto Mayor
113	Infectología Pediátrica
114	Alergología pediátrica
\.


--
-- Name: especialidades_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('especialidades_id_seq', 1, false);


--
-- Data for Name: expediente; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY expediente (id, paciente_id, numero_expediente) FROM stdin;
1	1	1234
\.


--
-- Name: expediente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('expediente_id_seq', 1, true);


--
-- Data for Name: medicamento; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY medicamento (id, nombre_medicamento) FROM stdin;
1	Glibenclamida 5 mg tableta oral empaque primario\n
2	Metformina Clorhidrato 850 mg tableta oral empaque primario individual o frasco\n
3	Propranolol clorhidrato 40 mg Tableta Oral Empaque primario individual, protegido de la luz\n
4	Amlodipina (Besilato) 5 mg Tableta Oral Empaque primario individual protegido de la luz\n
5	Mononitrato Isosorbide 40 mg tableta oral empaque primario individual
6	Digoxina 0.25 mg Tableta Oral Empaque primario individual\n
7	Furosemida 40 mg tableta oral empaque primario individual protegido de la luz\n
8	Imipramina Clorhidrato de 25 mg tableta recubierta oral empaque primario individual\n
9	Biperideno Clorhidrato 2 mg tableta oral empaque primario individual\n
10	Carbamazepina, 200 mg tableta\n
11	Ergotamina tartrato+cafeina (1+100) mg tableta o capsula oral empaque primario individual o frasco, protegido de la luz\n
12	Prednisona 5 mg Tableta Oral Empaque primario individual\n
13	Acido valproico  o Valproato de Sodio 500 mg  tableta con cubierta entérica oral empaque primario individual o frasco\n
14	Vitamina D3 0.25 mcg tableta o capsula oral empaque primario individual o frasco, protegido de la luz\n
15	Carvedilol 6.25 mg Tableta Oral Empaque primario individual o frasco, protegido de la luz\n
16	Carvedilol 25 mg Tableta Oral Empaque primario individual o frasco, protegido de la luz\n
17	Insulina humana cristalina ADN recombinante 100 U.I./ML, Solución inyectable IM-IV-SC, Frasco vial 10 ml, protegido de la luz\n
18	Insulina humana isofana NPH-ADN 100 U/ml\n
19	Amiodarona Clorhidrato 200 mg tableta oral empaque primario individual, protegida de la luz\n
20	Acido acetilsalicílico (80-100) mg tableta oral empaque primario individula\n
21	Fenitoína Sódica 100 mg Cápsula de liberación prolongada Oral Empaque primario individual o frasco, protegido de la luz\n
22	Verapamilo clorhidrato 240 mg tableta,empaque  primario individual\n
23	Nifedipina 30 mg tableta de liberación prolongada oral empaque primario individual protegido de la luz\n
24	Enalapril maleato 20 mg,empaque  primario individual\n
25	Espironolactona 100 mgtableta oral empaque primario individual, protegido de la luz\n
26	Propiltiouracilo 50 mg tableta oral empaque primario individual\n
27	Prednisona 50 mg Tableta Oral Empaque primario individual\n
28	Tizanidina (Clorhidrato) 4 mg tableta oral empaque primario individual\n
29	Haloperidol  5 mg tableta oral empaque primario individula, protegido de la luz\n
30	Hidroclorotiazida, 25 mg tableta ranurada\n
31	Calcio (Carbonato) 600 mg tableta o capsula oral empaque primario individual o frasco\n
32	Alopurinol 300 mg Tableta Oral Empaque primario individual\n
33	Enalapril maleato 5 mg,empaque  primario individual\n
34	Irbesartan 300 mg tableta oral empaque primario individual\n
35	Clopidogrel bisulfato 75 mg tableta recubierta oral empaque primario individual\n
36	Atenolol 100 mg Tableta Oral Empaque primario individual
37	Amitriptilina Clorhidrato 25 mg tablera recubierta oral empaque primario individual\n
38	Memantina Clorhidrato 10 mg tableta oral empaque primario individual\n
39	Levotiroxina Sódica 0.05mg (50 mcg) tableta oral empaque primario individual, protegido de la luz\n
40	Nimodipina 30 mg tableta oral empaque primario individual, protegido de la luz\n
41	Haloperidol  2 mg/ml  solucion oral frasco gotero 15 ml protegido de la luz\n
42	Topiramato 25 mg tableta recubierta o cápsula oral empaque primario individual o frasco\n
43	Acetazolamida 250 mg tableta oral empaque primario individual o frasco\n
44	Imipramina Clorhidrato de 10 mg tableta recubierta oral empaque primario individual\n
45	Levodopa + carbidopa (250+25) mg tableta oral empaque primario individual, protegido de la luz\n
46	Levotiroxina Sódica 0.10mg (100 mcg) tableta oral empaque primario individual, protegido de la luz\n
\.


--
-- Name: medicamento_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('medicamento_id_seq', 1, false);


--
-- Data for Name: medicos; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY medicos (id, nombre_medico) FROM stdin;
1	DR RIVERA
2	OTRO MEDICO
3	ORELLANA CORNEJO RAFAEL ANTONIO
4	GALVEZ NUILA MARIO ROLANDO
5	OLIVA DURAN CLAYRE ELIZABETH
6	NERIO HERNANDEZ LEE BAIRON
7	AREVALO FLORES ALEXANDER ANTONIO
8	MERINO MAGAÑA CLAUDIA CRISTINA
9	RODRIGUEZ MELENDEZ GERMAN RAFAEL
10	CASTILLEJOS CACERES ISAURA GERALDINA
11	MARTINEZ NOVOA IVANIA YASMIN
12	LOPEZ TORRES  REINA G. ERICKA
13	PEÑA MARTINEZ SUSANA LISSETH
14	ZOLANO PINEDA EVA MARIA
15	GuANDIQUE DURAN MARCO TULIO
16	DIAZ CRUZ LAURA FRANCINA
17	CHICAS L MARIA ALFONSINA
18	LAZO AVALOS de LEIVA SILVIA
19	CERRATO MARTINEZ MANUEL DE JESUS
20	IRAHETA LOPEZ MARTA EUGENIA
21	BASAGOITIA GARCIA ANA MARIA
22	RIVERA CANO MARTHA REBECA 
23	VILLATORO ROSA EVER POLICARPO
24	HERNANDEZ LUCINDA
25	AVILES SERRANO DE LARA TERESA ISABEL
26	CHAVEZ GONZALEZ JOSE ROBERTO
27	CUADRA SOTO ROBERTO CARLOS
28	FLORES ALFARO SALOMON
29	CAMPOS IBARRA ASTUL ELIAS
30	CORLETO GODOY CARLOS MANUEL
31	AMADOR OSCAR
32	ESCOBAR MENJIVAR KARLA ALEJANDRA
33	MILLA RIVERA JUAN DONATO
34	TRUJILLO ALVAREZ LUIS ANTONIO
35	BENITEZ HERNANDEZ ANA LIDIA
36	MESTIZO VILMA PATRICIA
37	CABRERA CANDRAY MARCIAL FIDEL
38	OSORIO VARGAS DE MORA CONSUELO DE JESUS
39	SOLANO AVILA CARLA BEATRIZ
40	SOLANO PAREDES OVIDIO BALMORE
41	RIVERA MEJIA RAMON ALFREDO
42	RIVERA MEJIA RAMON ALFREDO
43	VIVAS VANEGAS RICARDO ALFREDO
44	CAMPOS DE RODRIGUEZ MARIA JOSE
45	CERON LOPEZ JOSE SANTIAGO
46	COLATO GARCIA LUIS RAMON
47	JIMENEZ GUZMAN de SACA ROSARIO EUGENIA
48	LOPEZ AGUILAR ROBERTO
49	RIVERA PORTILLO TERESA ISABEL
50	GORDITO MORENO MARIA GUADALUPE
51	RIVAS RAMOS CARLOS ALFREDO
52	MONGE ELIAS RICARDO MIGUEL
53	TORRES ORTIZ GLORIA ESPERANZA
54	PORTILLO JOSE NEMESIO
55	AGUILAR ALAS ANA  LIZBETH
56	CASTANEDA JOSE LUIS
57	MENENDEZ MORENO EDGARDO JOSUE
58	ARGUETA MARROQUIN de MAZA MARTA DINORAH
59	ORELLANA MEJIA CARLOS ROBERTO
60	NOCHES CUBIAS JESSENIA ELIZABETH 
61	CRUZ DE TRUJILLO ZULMA
62	FLORES GUMERO ROLANDO JOAQUIN
63	LEIVA MERINO RICARDO ALBERTO
64	COTO MELENDEZ SERGIO R.
65	BARRIENTOS AGUILAR CARLOS ERNESTO
66	COREAS QUINTANILLA CAMILO ERNESTO
67	GUZMAN ANZORA JUAN JOSE
68	CABRERA AGUILAR GUSTAVO ADOLFO
69	HERNANDEZ MORENO NARDA SOFIA
70	HIDALGO CASTELLANOS JUAN CARLOS
71	MARTINEZ SOSA MYNOR ULISES
72	AVELAR DE RAMOS MARITZA MORENA
73	RODRIGUEZ RAMIREZ MAURICIO
74	PORTILLO JANDRES JOSE OVIDIO
75	MENJIVAR CASTILLO RICARDO ERNESTO
76	MOZO MELENDEZ LUIS MAURICIO
77	ESCOBAR TOLEDO JUAN GILBERTO
78	DELGADO ALEMAN CARLOS ALFREDO
80	VASQUEZ LOPEZ ALMA MELINA
81	PORTILLO ZELAYA VIOLETA BRISEIDA
82	SORIANO RIVERA ISAIAS ANTONIO
83	STHEPHANNY MARISSA DESIREE TORRES LOPEZ
84	MEDRANO MACHADO ENYIS YAHAIRA
85	PEREZ JONATHAN ALEXIS
86	GUEVARA RODRIGUEZ NEHEMIAS ANTONIO
87	AYALA FLORES ANGELICA MARIA
88	GUZMAN ORTEGA EUGENIO ALEJANDRO
89	QUINTANILLA FLORES CRISTINA BEATRIZ
90	CHICAS GARCIAS LUIS FERNANDO
79	CRUZ AGUILAR KAREN SOFIA
\.


--
-- Name: medicos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('medicos_id_seq', 1, false);


--
-- Data for Name: paciente; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY paciente (id, nombre) FROM stdin;
1	Samuel
\.


--
-- Name: paciente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('paciente_id_seq', 1, true);


--
-- Data for Name: recetas; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY recetas (id, especialidades_id, medicamento_id, medicos_id, expediente_id, fecha_programada, cantidad, recepcion, despacho, fecha_retiro) FROM stdin;
\.


--
-- Name: recetas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('recetas_id_seq', 1, false);


--
-- Name: especialidades_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY especialidades
    ADD CONSTRAINT especialidades_pkey PRIMARY KEY (id);


--
-- Name: expediente_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY expediente
    ADD CONSTRAINT expediente_pkey PRIMARY KEY (id);


--
-- Name: medicamento_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY medicamento
    ADD CONSTRAINT medicamento_pkey PRIMARY KEY (id);


--
-- Name: medicos_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY medicos
    ADD CONSTRAINT medicos_pkey PRIMARY KEY (id);


--
-- Name: paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY paciente
    ADD CONSTRAINT paciente_pkey PRIMARY KEY (id);


--
-- Name: recetas_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY recetas
    ADD CONSTRAINT recetas_pkey PRIMARY KEY (id);


--
-- Name: expediente_fkindex1; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX expediente_fkindex1 ON expediente USING btree (paciente_id);


--
-- Name: ifk_rel_02; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_02 ON expediente USING btree (paciente_id);


--
-- Name: ifk_rel_03; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_03 ON recetas USING btree (expediente_id);


--
-- Name: ifk_rel_04; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_04 ON recetas USING btree (medicos_id);


--
-- Name: ifk_rel_05; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_05 ON recetas USING btree (medicamento_id);


--
-- Name: ifk_rel_06; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_06 ON recetas USING btree (especialidades_id);


--
-- Name: recetas_fkindex1; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX recetas_fkindex1 ON recetas USING btree (expediente_id);


--
-- Name: recetas_fkindex2; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX recetas_fkindex2 ON recetas USING btree (medicos_id);


--
-- Name: recetas_fkindex3; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX recetas_fkindex3 ON recetas USING btree (medicamento_id);


--
-- Name: recetas_fkindex4; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX recetas_fkindex4 ON recetas USING btree (especialidades_id);


--
-- Name: expediente_paciente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY expediente
    ADD CONSTRAINT expediente_paciente_id_fkey FOREIGN KEY (paciente_id) REFERENCES paciente(id);


--
-- Name: recetas_especialidades_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY recetas
    ADD CONSTRAINT recetas_especialidades_id_fkey FOREIGN KEY (especialidades_id) REFERENCES especialidades(id);


--
-- Name: recetas_expediente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY recetas
    ADD CONSTRAINT recetas_expediente_id_fkey FOREIGN KEY (expediente_id) REFERENCES expediente(id);


--
-- Name: recetas_medicamento_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY recetas
    ADD CONSTRAINT recetas_medicamento_id_fkey FOREIGN KEY (medicamento_id) REFERENCES medicamento(id);


--
-- Name: recetas_medicos_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY recetas
    ADD CONSTRAINT recetas_medicos_id_fkey FOREIGN KEY (medicos_id) REFERENCES medicos(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

