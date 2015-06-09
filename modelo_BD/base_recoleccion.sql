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
-- Name: medicamentos; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE medicamentos (
    id integer NOT NULL,
    nombre text
);


ALTER TABLE medicamentos OWNER TO atf;

--
-- Name: medicamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE medicamentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE medicamentos_id_seq OWNER TO atf;

--
-- Name: medicamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE medicamentos_id_seq OWNED BY medicamentos.id;


--
-- Name: mnt_expediente; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE mnt_expediente (
    id integer NOT NULL,
    mnt_paciente_id integer NOT NULL,
    numero_exp character varying(10)
);


ALTER TABLE mnt_expediente OWNER TO atf;

--
-- Name: mnt_expediente_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE mnt_expediente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mnt_expediente_id_seq OWNER TO atf;

--
-- Name: mnt_expediente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE mnt_expediente_id_seq OWNED BY mnt_expediente.id;


--
-- Name: mnt_paciente; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE mnt_paciente (
    id integer NOT NULL,
    mnt_usuario_id integer NOT NULL,
    mnt_retiro_id integer NOT NULL,
    nombre text,
    telefono character varying(10),
    fecha_hora_registro timestamp without time zone
);


ALTER TABLE mnt_paciente OWNER TO atf;

--
-- Name: mnt_paciente_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE mnt_paciente_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mnt_paciente_id_seq OWNER TO atf;

--
-- Name: mnt_paciente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE mnt_paciente_id_seq OWNED BY mnt_paciente.id;


--
-- Name: mnt_retiro; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE mnt_retiro (
    id integer NOT NULL,
    retiro text
);


ALTER TABLE mnt_retiro OWNER TO atf;

--
-- Name: mnt_retiro_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE mnt_retiro_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mnt_retiro_id_seq OWNER TO atf;

--
-- Name: mnt_retiro_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE mnt_retiro_id_seq OWNED BY mnt_retiro.id;


--
-- Name: mnt_tipo_usuario; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE mnt_tipo_usuario (
    id integer NOT NULL,
    usuario text
);


ALTER TABLE mnt_tipo_usuario OWNER TO atf;

--
-- Name: mnt_tipo_usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE mnt_tipo_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mnt_tipo_usuario_id_seq OWNER TO atf;

--
-- Name: mnt_tipo_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE mnt_tipo_usuario_id_seq OWNED BY mnt_tipo_usuario.id;


--
-- Name: mnt_usuario; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE mnt_usuario (
    id integer NOT NULL,
    mnt_tipo_usuario_id integer NOT NULL,
    nombre character varying(125),
    usuario character varying(12),
    contrasenia character varying(8)
);


ALTER TABLE mnt_usuario OWNER TO atf;

--
-- Name: mnt_usuario_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE mnt_usuario_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE mnt_usuario_id_seq OWNER TO atf;

--
-- Name: mnt_usuario_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE mnt_usuario_id_seq OWNED BY mnt_usuario.id;


--
-- Name: paciente_retira_medicamentos; Type: TABLE; Schema: public; Owner: atf; Tablespace: 
--

CREATE TABLE paciente_retira_medicamentos (
    id integer NOT NULL,
    medicamentos_id integer NOT NULL,
    mnt_paciente_id integer NOT NULL
);


ALTER TABLE paciente_retira_medicamentos OWNER TO atf;

--
-- Name: paciente_retira_medicamentos_id_seq; Type: SEQUENCE; Schema: public; Owner: atf
--

CREATE SEQUENCE paciente_retira_medicamentos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE paciente_retira_medicamentos_id_seq OWNER TO atf;

--
-- Name: paciente_retira_medicamentos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: atf
--

ALTER SEQUENCE paciente_retira_medicamentos_id_seq OWNED BY paciente_retira_medicamentos.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY medicamentos ALTER COLUMN id SET DEFAULT nextval('medicamentos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_expediente ALTER COLUMN id SET DEFAULT nextval('mnt_expediente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_paciente ALTER COLUMN id SET DEFAULT nextval('mnt_paciente_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_retiro ALTER COLUMN id SET DEFAULT nextval('mnt_retiro_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_tipo_usuario ALTER COLUMN id SET DEFAULT nextval('mnt_tipo_usuario_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_usuario ALTER COLUMN id SET DEFAULT nextval('mnt_usuario_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: atf
--

ALTER TABLE ONLY paciente_retira_medicamentos ALTER COLUMN id SET DEFAULT nextval('paciente_retira_medicamentos_id_seq'::regclass);


--
-- Data for Name: medicamentos; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY medicamentos (id, nombre) FROM stdin;
\.


--
-- Name: medicamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('medicamentos_id_seq', 1, false);


--
-- Data for Name: mnt_expediente; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY mnt_expediente (id, mnt_paciente_id, numero_exp) FROM stdin;
1	1	123
2	4	1234
3	5	12345
\.


--
-- Name: mnt_expediente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('mnt_expediente_id_seq', 3, true);


--
-- Data for Name: mnt_paciente; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY mnt_paciente (id, mnt_usuario_id, mnt_retiro_id, nombre, telefono, fecha_hora_registro) FROM stdin;
1	1	1	Samuel Alexander	2284-2890	\N
4	1	2	Samuel Alexander Pérez	2284-2890	2015-06-08 23:55:22
5	1	2	Samuel Alexander Pérez	2284-2890	2015-06-08 23:56:42
\.


--
-- Name: mnt_paciente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('mnt_paciente_id_seq', 5, true);


--
-- Data for Name: mnt_retiro; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY mnt_retiro (id, retiro) FROM stdin;
1	Paciente
2	Familiar
3	Otro
\.


--
-- Name: mnt_retiro_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('mnt_retiro_id_seq', 3, true);


--
-- Data for Name: mnt_tipo_usuario; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY mnt_tipo_usuario (id, usuario) FROM stdin;
1	Administrador
2	Digitador
\.


--
-- Name: mnt_tipo_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('mnt_tipo_usuario_id_seq', 2, true);


--
-- Data for Name: mnt_usuario; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY mnt_usuario (id, mnt_tipo_usuario_id, nombre, usuario, contrasenia) FROM stdin;
1	1	Samuel Alexander Perez	salexander	123
\.


--
-- Name: mnt_usuario_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('mnt_usuario_id_seq', 1, true);


--
-- Data for Name: paciente_retira_medicamentos; Type: TABLE DATA; Schema: public; Owner: atf
--

COPY paciente_retira_medicamentos (id, medicamentos_id, mnt_paciente_id) FROM stdin;
\.


--
-- Name: paciente_retira_medicamentos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: atf
--

SELECT pg_catalog.setval('paciente_retira_medicamentos_id_seq', 1, false);


--
-- Name: medicamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY medicamentos
    ADD CONSTRAINT medicamentos_pkey PRIMARY KEY (id);


--
-- Name: mnt_expediente_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY mnt_expediente
    ADD CONSTRAINT mnt_expediente_pkey PRIMARY KEY (id);


--
-- Name: mnt_paciente_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY mnt_paciente
    ADD CONSTRAINT mnt_paciente_pkey PRIMARY KEY (id);


--
-- Name: mnt_retiro_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY mnt_retiro
    ADD CONSTRAINT mnt_retiro_pkey PRIMARY KEY (id);


--
-- Name: mnt_tipo_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY mnt_tipo_usuario
    ADD CONSTRAINT mnt_tipo_usuario_pkey PRIMARY KEY (id);


--
-- Name: mnt_usuario_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY mnt_usuario
    ADD CONSTRAINT mnt_usuario_pkey PRIMARY KEY (id);


--
-- Name: paciente_retira_medicamentos_pkey; Type: CONSTRAINT; Schema: public; Owner: atf; Tablespace: 
--

ALTER TABLE ONLY paciente_retira_medicamentos
    ADD CONSTRAINT paciente_retira_medicamentos_pkey PRIMARY KEY (id);


--
-- Name: ifk_rel_01; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_01 ON mnt_expediente USING btree (mnt_paciente_id);


--
-- Name: ifk_rel_02; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_02 ON paciente_retira_medicamentos USING btree (mnt_paciente_id);


--
-- Name: ifk_rel_03; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_03 ON paciente_retira_medicamentos USING btree (medicamentos_id);


--
-- Name: ifk_rel_04; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_04 ON mnt_paciente USING btree (mnt_retiro_id);


--
-- Name: ifk_rel_05; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_05 ON mnt_usuario USING btree (mnt_tipo_usuario_id);


--
-- Name: ifk_rel_06; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX ifk_rel_06 ON mnt_paciente USING btree (mnt_usuario_id);


--
-- Name: mnt_expediente_fkindex1; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX mnt_expediente_fkindex1 ON mnt_expediente USING btree (mnt_paciente_id);


--
-- Name: mnt_paciente_fkindex1; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX mnt_paciente_fkindex1 ON mnt_paciente USING btree (mnt_retiro_id);


--
-- Name: mnt_paciente_fkindex2; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX mnt_paciente_fkindex2 ON mnt_paciente USING btree (mnt_usuario_id);


--
-- Name: mnt_usuario_fkindex1; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX mnt_usuario_fkindex1 ON mnt_usuario USING btree (mnt_tipo_usuario_id);


--
-- Name: paciente_retira_medicamentos_fkindex1; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX paciente_retira_medicamentos_fkindex1 ON paciente_retira_medicamentos USING btree (mnt_paciente_id);


--
-- Name: paciente_retira_medicamentos_fkindex2; Type: INDEX; Schema: public; Owner: atf; Tablespace: 
--

CREATE INDEX paciente_retira_medicamentos_fkindex2 ON paciente_retira_medicamentos USING btree (medicamentos_id);


--
-- Name: mnt_expediente_mnt_paciente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_expediente
    ADD CONSTRAINT mnt_expediente_mnt_paciente_id_fkey FOREIGN KEY (mnt_paciente_id) REFERENCES mnt_paciente(id);


--
-- Name: mnt_paciente_mnt_retiro_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_paciente
    ADD CONSTRAINT mnt_paciente_mnt_retiro_id_fkey FOREIGN KEY (mnt_retiro_id) REFERENCES mnt_retiro(id);


--
-- Name: mnt_paciente_mnt_usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_paciente
    ADD CONSTRAINT mnt_paciente_mnt_usuario_id_fkey FOREIGN KEY (mnt_usuario_id) REFERENCES mnt_usuario(id);


--
-- Name: mnt_usuario_mnt_tipo_usuario_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY mnt_usuario
    ADD CONSTRAINT mnt_usuario_mnt_tipo_usuario_id_fkey FOREIGN KEY (mnt_tipo_usuario_id) REFERENCES mnt_tipo_usuario(id);


--
-- Name: paciente_retira_medicamentos_medicamentos_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY paciente_retira_medicamentos
    ADD CONSTRAINT paciente_retira_medicamentos_medicamentos_id_fkey FOREIGN KEY (medicamentos_id) REFERENCES medicamentos(id);


--
-- Name: paciente_retira_medicamentos_mnt_paciente_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: atf
--

ALTER TABLE ONLY paciente_retira_medicamentos
    ADD CONSTRAINT paciente_retira_medicamentos_mnt_paciente_id_fkey FOREIGN KEY (mnt_paciente_id) REFERENCES mnt_paciente(id);


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

