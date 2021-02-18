--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5
-- Dumped by pg_dump version 12.5 (Ubuntu 12.5-0ubuntu0.20.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: classification; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.classification (
    id integer NOT NULL,
    code character varying(50) NOT NULL,
    descrip character varying(4000) DEFAULT NULL::character varying,
    classification_id integer
);


ALTER TABLE public.classification OWNER TO main;

--
-- Name: classification_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.classification_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.classification_id_seq OWNER TO main;

--
-- Name: classification_user; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.classification_user (
    classification_id integer NOT NULL,
    user_id integer NOT NULL
);


ALTER TABLE public.classification_user OWNER TO main;

--
-- Name: doctrine_migration_versions; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.doctrine_migration_versions (
    version character varying(191) NOT NULL,
    executed_at timestamp(0) without time zone DEFAULT NULL::timestamp without time zone,
    execution_time integer
);


ALTER TABLE public.doctrine_migration_versions OWNER TO main;

--
-- Name: document; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document (
    id integer NOT NULL,
    code character varying(50) DEFAULT NULL::character varying,
    text text,
    label character varying(255) NOT NULL,
    start_date date NOT NULL,
    end_date date,
    state character varying(255) DEFAULT NULL::character varying,
    uri character varying(4000) DEFAULT NULL::character varying,
    version character varying(20) DEFAULT NULL::character varying,
    classification_id integer
);


ALTER TABLE public.document OWNER TO main;

--
-- Name: document_document; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document_document (
    id integer NOT NULL,
    dublin_core_id integer,
    document_source_id integer NOT NULL,
    document_target_id integer NOT NULL
);


ALTER TABLE public.document_document OWNER TO main;

--
-- Name: document_document_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.document_document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_document_id_seq OWNER TO main;

--
-- Name: document_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.document_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_id_seq OWNER TO main;

--
-- Name: document_metadata; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document_metadata (
    document_id integer NOT NULL,
    metadata_id integer NOT NULL
);


ALTER TABLE public.document_metadata OWNER TO main;

--
-- Name: dublin_core; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.dublin_core (
    id integer NOT NULL,
    code character varying(50) NOT NULL,
    is_relation boolean NOT NULL,
    descrip character varying(4000) DEFAULT NULL::character varying
);


ALTER TABLE public.dublin_core OWNER TO main;

--
-- Name: dublin_core_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.dublin_core_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dublin_core_id_seq OWNER TO main;

--
-- Name: metadata; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.metadata (
    id integer NOT NULL,
    code character varying(50) NOT NULL,
    descrip character varying(4000) DEFAULT NULL::character varying,
    dublin_core_id integer
);


ALTER TABLE public.metadata OWNER TO main;

--
-- Name: metadata_classification; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.metadata_classification (
    metadata_id integer NOT NULL,
    classification_id integer NOT NULL
);


ALTER TABLE public.metadata_classification OWNER TO main;

--
-- Name: metadata_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.metadata_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.metadata_id_seq OWNER TO main;

--
-- Name: user; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public."user" (
    id integer NOT NULL,
    ldap_id character varying(255) DEFAULT NULL::character varying,
    first_name character varying(255) DEFAULT NULL::character varying,
    last_name character varying(255) DEFAULT NULL::character varying
);


ALTER TABLE public."user" OWNER TO main;

--
-- Name: user_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.user_id_seq OWNER TO main;

--
-- Data for Name: classification; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.classification (id, code, descrip, classification_id) FROM stdin;
1	00000	Classif niveau 0	\N
2	00001	Classif niveau 1	\N
\.


--
-- Data for Name: classification_user; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.classification_user (classification_id, user_id) FROM stdin;
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
DoctrineMigrations\\Version20210201220955	2021-02-09 22:27:18	23
DoctrineMigrations\\Version20210202185651	2021-02-09 22:27:18	0
DoctrineMigrations\\Version20210202190152	2021-02-09 22:27:18	0
DoctrineMigrations\\Version20210202190506	2021-02-09 22:27:18	0
DoctrineMigrations\\Version20210202195906	2021-02-09 22:36:33	20
DoctrineMigrations\\Version20210206174641	2021-02-09 22:36:33	33
DoctrineMigrations\\Version20210208010344	2021-02-09 22:36:33	4
DoctrineMigrations\\Version20210208010847	2021-02-09 22:36:33	8
DoctrineMigrations\\Version20210208011128	2021-02-09 22:36:33	7
DoctrineMigrations\\Version20210208011426	2021-02-09 22:36:33	8
DoctrineMigrations\\Version20210208162139	2021-02-09 22:36:33	12
DoctrineMigrations\\Version20210208165150	2021-02-09 22:36:33	12
DoctrineMigrations\\Version20210208165349	2021-02-09 22:36:33	12
DoctrineMigrations\\Version20210208170216	2021-02-09 22:36:33	4
DoctrineMigrations\\Version20210208172449	2021-02-09 22:36:33	4
DoctrineMigrations\\Version20210209034327	2021-02-09 22:36:33	1
DoctrineMigrations\\Version20210209034857	2021-02-09 22:36:33	8
DoctrineMigrations\\Version20210209035132	2021-02-09 22:36:33	0
DoctrineMigrations\\Version20210209035757	2021-02-09 22:36:33	1
DoctrineMigrations\\Version20210209042028	2021-02-09 22:36:33	10
DoctrineMigrations\\Version20210209042613	2021-02-09 22:36:33	10
DoctrineMigrations\\Version20210209043949	2021-02-09 22:36:33	5
DoctrineMigrations\\Version20210209044208	2021-02-10 11:43:46	32
DoctrineMigrations\\Version20210210164308	2021-02-10 11:58:50	14
DoctrineMigrations\\Version20210209044542	\N	\N
DoctrineMigrations\\Version20210209044744	\N	\N
DoctrineMigrations\\Version20210209045122	\N	\N
DoctrineMigrations\\Version20210209130008	\N	\N
DoctrineMigrations\\Version20210210032647	\N	\N
DoctrineMigrations\\Version20210210033801	\N	\N
DoctrineMigrations\\Version20210210173151	2021-02-10 12:32:51	70
DoctrineMigrations\\Version20210211180353	2021-02-11 13:03:57	29
\.


--
-- Data for Name: document; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document (id, code, text, label, start_date, end_date, state, uri, version, classification_id) FROM stdin;
1	\N	Document test 1	doc1	2021-02-10	\N	en travail	\N	\N	\N
\.


--
-- Data for Name: document_document; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_document (id, dublin_core_id, document_source_id, document_target_id) FROM stdin;
\.


--
-- Data for Name: document_metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_metadata (document_id, metadata_id) FROM stdin;
\.


--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core (id, code, is_relation, descrip) FROM stdin;
\.


--
-- Data for Name: metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.metadata (id, code, descrip, dublin_core_id) FROM stdin;
\.


--
-- Data for Name: metadata_classification; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.metadata_classification (metadata_id, classification_id) FROM stdin;
\.


--
-- Data for Name: user; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public."user" (id, ldap_id, first_name, last_name) FROM stdin;
\.


--
-- Name: classification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.classification_id_seq', 2, true);


--
-- Name: document_document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_document_id_seq', 1, false);


--
-- Name: document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_id_seq', 1, true);


--
-- Name: dublin_core_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.dublin_core_id_seq', 1, false);


--
-- Name: metadata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.metadata_id_seq', 1, false);


--
-- Name: user_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.user_id_seq', 1, false);


--
-- Name: classification classification_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification
    ADD CONSTRAINT classification_pkey PRIMARY KEY (id);


--
-- Name: classification_user classification_user_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification_user
    ADD CONSTRAINT classification_user_pkey PRIMARY KEY (classification_id, user_id);


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


--
-- Name: document_document document_document_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT document_document_pkey PRIMARY KEY (id);


--
-- Name: document_metadata document_metadata_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_metadata
    ADD CONSTRAINT document_metadata_pkey PRIMARY KEY (document_id, metadata_id);


--
-- Name: document document_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document
    ADD CONSTRAINT document_pkey PRIMARY KEY (id);


--
-- Name: dublin_core dublin_core_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.dublin_core
    ADD CONSTRAINT dublin_core_pkey PRIMARY KEY (id);


--
-- Name: metadata_classification metadata_classification_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata_classification
    ADD CONSTRAINT metadata_classification_pkey PRIMARY KEY (metadata_id, classification_id);


--
-- Name: metadata metadata_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata
    ADD CONSTRAINT metadata_pkey PRIMARY KEY (id);


--
-- Name: user user_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public."user"
    ADD CONSTRAINT user_pkey PRIMARY KEY (id);


--
-- Name: classification_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX classification_uk ON public.classification USING btree (code);


--
-- Name: document_document_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX document_document_uk ON public.document_document USING btree (document_source_id, document_target_id, dublin_core_id);


--
-- Name: document_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX document_uk ON public.document USING btree (code);


--
-- Name: dublin_core_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX dublin_core_uk ON public.dublin_core USING btree (code);


--
-- Name: idx_456bd2312a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_456bd2312a86559f ON public.classification USING btree (classification_id);


--
-- Name: idx_4f1434141df597a7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_4f1434141df597a7 ON public.metadata USING btree (dublin_core_id);


--
-- Name: idx_57a87b2f1df597a7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_57a87b2f1df597a7 ON public.document_document USING btree (dublin_core_id);


--
-- Name: idx_57a87b2f7b623c7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_57a87b2f7b623c7 ON public.document_document USING btree (document_target_id);


--
-- Name: idx_57a87b2f870434c0; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_57a87b2f870434c0 ON public.document_document USING btree (document_source_id);


--
-- Name: idx_926d9f72a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_926d9f72a86559f ON public.classification_user USING btree (classification_id);


--
-- Name: idx_926d9f7a76ed395; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_926d9f7a76ed395 ON public.classification_user USING btree (user_id);


--
-- Name: idx_c0d5c54dc33f7837; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_c0d5c54dc33f7837 ON public.document_metadata USING btree (document_id);


--
-- Name: idx_c0d5c54ddc9ee959; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_c0d5c54ddc9ee959 ON public.document_metadata USING btree (metadata_id);


--
-- Name: idx_d33f5af02a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d33f5af02a86559f ON public.metadata_classification USING btree (classification_id);


--
-- Name: idx_d33f5af0dc9ee959; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d33f5af0dc9ee959 ON public.metadata_classification USING btree (metadata_id);


--
-- Name: idx_d8698a762a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d8698a762a86559f ON public.document USING btree (classification_id);


--
-- Name: metadata_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX metadata_uk ON public.metadata USING btree (code);


--
-- Name: user_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX user_uk ON public."user" USING btree (ldap_id);


--
-- Name: classification fk_456bd2312a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification
    ADD CONSTRAINT fk_456bd2312a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id);


--
-- Name: metadata fk_4f1434141df597a7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata
    ADD CONSTRAINT fk_4f1434141df597a7 FOREIGN KEY (dublin_core_id) REFERENCES public.dublin_core(id);


--
-- Name: document_document fk_57a87b2f1df597a7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT fk_57a87b2f1df597a7 FOREIGN KEY (dublin_core_id) REFERENCES public.dublin_core(id);


--
-- Name: document_document fk_57a87b2f7b623c7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT fk_57a87b2f7b623c7 FOREIGN KEY (document_target_id) REFERENCES public.document(id);


--
-- Name: document_document fk_57a87b2f870434c0; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_document
    ADD CONSTRAINT fk_57a87b2f870434c0 FOREIGN KEY (document_source_id) REFERENCES public.document(id);


--
-- Name: classification_user fk_926d9f72a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification_user
    ADD CONSTRAINT fk_926d9f72a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id) ON DELETE CASCADE;


--
-- Name: classification_user fk_926d9f7a76ed395; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification_user
    ADD CONSTRAINT fk_926d9f7a76ed395 FOREIGN KEY (user_id) REFERENCES public."user"(id) ON DELETE CASCADE;


--
-- Name: document_metadata fk_c0d5c54dc33f7837; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_metadata
    ADD CONSTRAINT fk_c0d5c54dc33f7837 FOREIGN KEY (document_id) REFERENCES public.document(id) ON DELETE CASCADE;


--
-- Name: document_metadata fk_c0d5c54ddc9ee959; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_metadata
    ADD CONSTRAINT fk_c0d5c54ddc9ee959 FOREIGN KEY (metadata_id) REFERENCES public.metadata(id) ON DELETE CASCADE;


--
-- Name: metadata_classification fk_d33f5af02a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata_classification
    ADD CONSTRAINT fk_d33f5af02a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id) ON DELETE CASCADE;


--
-- Name: metadata_classification fk_d33f5af0dc9ee959; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata_classification
    ADD CONSTRAINT fk_d33f5af0dc9ee959 FOREIGN KEY (metadata_id) REFERENCES public.metadata(id) ON DELETE CASCADE;


--
-- Name: document fk_d8698a762a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document
    ADD CONSTRAINT fk_d8698a762a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id);


--
-- PostgreSQL database dump complete
--

