--
-- PostgreSQL database dump
--

-- Dumped from database version 12.5
-- Dumped by pg_dump version 12.6 (Ubuntu 12.6-0ubuntu0.20.04.1)

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
-- Name: admin; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.admin (
    id integer NOT NULL,
    username character varying(180) NOT NULL,
    roles json NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.admin OWNER TO main;

--
-- Name: admin_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.admin_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.admin_id_seq OWNER TO main;

--
-- Name: classification; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.classification (
    id integer NOT NULL,
    code character varying(50) NOT NULL,
    description text,
    title character varying(500) NOT NULL
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
    text text,
    title character varying(255) NOT NULL,
    start_date date NOT NULL,
    end_date date,
    state character varying(255) DEFAULT NULL::character varying,
    version character varying(20) DEFAULT NULL::character varying,
    classification_id integer NOT NULL
);


ALTER TABLE public.document OWNER TO main;

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
-- Name: document_relation; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.document_relation (
    id integer NOT NULL,
    dublin_core_relation_id integer,
    document_source_id integer NOT NULL,
    document_target_id integer NOT NULL
);


ALTER TABLE public.document_relation OWNER TO main;

--
-- Name: document_relation_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.document_relation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.document_relation_id_seq OWNER TO main;

--
-- Name: dublin_core_element; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.dublin_core_element (
    id integer NOT NULL,
    element character varying(50) NOT NULL,
    definition character varying(4000) DEFAULT NULL::character varying
);


ALTER TABLE public.dublin_core_element OWNER TO main;

--
-- Name: dublin_core_element_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.dublin_core_element_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dublin_core_element_id_seq OWNER TO main;

--
-- Name: dublin_core_relation; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.dublin_core_relation (
    id integer NOT NULL,
    relation character varying(50) NOT NULL,
    definition character varying(4000) DEFAULT NULL::character varying
);


ALTER TABLE public.dublin_core_relation OWNER TO main;

--
-- Name: dublin_core_relation_id_seq; Type: SEQUENCE; Schema: public; Owner: main
--

CREATE SEQUENCE public.dublin_core_relation_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.dublin_core_relation_id_seq OWNER TO main;

--
-- Name: metadata; Type: TABLE; Schema: public; Owner: main
--

CREATE TABLE public.metadata (
    id integer NOT NULL,
    term character varying(50) NOT NULL,
    description character varying(4000) DEFAULT NULL::character varying,
    dublin_core_element_id integer
);


ALTER TABLE public.metadata OWNER TO main;

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
-- Data for Name: admin; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.admin (id, username, roles, password) FROM stdin;
2	admin	["ROLE_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$FaxYTKr6tHFuk5FimcNABA$/Zj8RRuagZJtBRp/7QOstRzVJjJMTg+TZeE2wEs/OH8
\.


--
-- Data for Name: classification; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.classification (id, code, description, title) FROM stdin;
9	00000	<div>Demo <strong>classification</strong></div>	Root Classification
10	00001	<div>Demo First Classification</div>	First Classification
11	00002	<div><strong>Demo&nbsp;</strong>meta_doc third classification</div>	Third classification
\.


--
-- Data for Name: doctrine_migration_versions; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.doctrine_migration_versions (version, executed_at, execution_time) FROM stdin;
\.


--
-- Data for Name: document; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document (id, text, title, start_date, end_date, state, version, classification_id) FROM stdin;
22	<div>Test for meta_doc demo <em>first document</em></div>	Demo title	2021-03-22	\N	Creation	1	9
23	<div>Demo test for<strong> meta_doc</strong></div>	Document for the firs classification test	2021-03-22	\N	Revision	1	10
24	<div>Demo test for <strong><em>the third classification</em></strong></div>	Document for the third classification	2021-03-22	\N	Creation	1	11
25	<div>demo <strong>meta_doc</strong></div>	another document	2021-03-22	\N	Creation	1	9
\.


--
-- Data for Name: document_metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_metadata (document_id, metadata_id) FROM stdin;
23	10
23	11
22	10
24	11
24	12
25	10
\.


--
-- Data for Name: document_relation; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_relation (id, dublin_core_relation_id, document_source_id, document_target_id) FROM stdin;
7	2	23	22
8	3	23	24
\.


--
-- Data for Name: dublin_core_element; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_element (id, element, definition) FROM stdin;
1	Title	A name given to the resource.
2	Subject	The topic of the resource.
3	Description	An account of the resource.
4	Creator	An entity primarily responsible for making the resource.
5	Publisher	An entity responsible for making the resource available.
6	Contributor	An entity responsible for making contributions to the resource.
7	Date	A point or period of time associated with an event in the lifecycle of the resource.
8	Type	The nature or genre of the resource.
9	Format	The file format, physical medium, or dimensions of the resource.
10	Identifier	An unambiguous reference to the resource within a given context.
11	Source	A related resource from which the described resource is derived.
12	Language	A language of the resource.
13	Relation	A related resource.
14	Coverage	The spatial or temporal topic of the resource, the spatial applicability of the resource, or the jurisdiction under which the resource is relevant.
15	Rights	Information about rights held in and over the resource.
16	issued	Date of formal issuance of the resource.
\.


--
-- Data for Name: dublin_core_relation; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	isReplacedBy	A related resource that supplants, displaces, or supersedes the described resource.
2	isFormatOf	A pre-existing related resource that is substantially the same as the described resource, but in another format.
3	isPartOf	A related resource in which the described resource is physically or logically included.
4	isReferencedBy	A related resource that references, cites, or otherwise points to the described resource.
5	isRequiredBy	A related resource that requires the described resource to support its function, delivery, or coherence.
6	isVersionOf	A related resource of which the described resource is a version, edition, or adaptation.
7	hasFormat	A related resource that is substantially the same as the pre-existing described resource, but in another format.
8	hasPart	A related resource that is included either physically or logically in the described resource.
9	hasVersion	A related resource that is a version, edition, or adaptation of the described resource.
\.


--
-- Data for Name: metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.metadata (id, term, description, dublin_core_element_id) FROM stdin;
10	demo meta_doc term	test demo meta_doc term	2
11	Paper format	Meta_doc term test	9
12	meta term for meta_doc	Contributor test	6
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.admin_id_seq', 2, true);


--
-- Name: classification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.classification_id_seq', 11, true);


--
-- Name: document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_id_seq', 25, true);


--
-- Name: document_relation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_relation_id_seq', 8, true);


--
-- Name: dublin_core_element_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.dublin_core_element_id_seq', 50, true);


--
-- Name: dublin_core_relation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.dublin_core_relation_id_seq', 50, true);


--
-- Name: metadata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.metadata_id_seq', 12, true);


--
-- Name: admin admin_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.admin
    ADD CONSTRAINT admin_pkey PRIMARY KEY (id);


--
-- Name: classification classification_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.classification
    ADD CONSTRAINT classification_pkey PRIMARY KEY (id);


--
-- Name: doctrine_migration_versions doctrine_migration_versions_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.doctrine_migration_versions
    ADD CONSTRAINT doctrine_migration_versions_pkey PRIMARY KEY (version);


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
-- Name: document_relation document_relation_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_relation
    ADD CONSTRAINT document_relation_pkey PRIMARY KEY (id);


--
-- Name: dublin_core_element dublin_core_element_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.dublin_core_element
    ADD CONSTRAINT dublin_core_element_pkey PRIMARY KEY (id);


--
-- Name: dublin_core_relation dublin_core_relation_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.dublin_core_relation
    ADD CONSTRAINT dublin_core_relation_pkey PRIMARY KEY (id);


--
-- Name: metadata metadata_pkey; Type: CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata
    ADD CONSTRAINT metadata_pkey PRIMARY KEY (id);


--
-- Name: classification_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX classification_uk ON public.classification USING btree (code);


--
-- Name: document_relation_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX document_relation_uk ON public.document_relation USING btree (document_source_id, document_target_id, dublin_core_relation_id);


--
-- Name: document_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX document_uk ON public.document USING btree (title, start_date, version, classification_id);


--
-- Name: dublin_core_element_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX dublin_core_element_uk ON public.dublin_core_element USING btree (element);


--
-- Name: dublin_core_relation_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX dublin_core_relation_uk ON public.dublin_core_relation USING btree (relation);


--
-- Name: idx_4f143414e2021f97; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_4f143414e2021f97 ON public.metadata USING btree (dublin_core_element_id);


--
-- Name: idx_c0d5c54dc33f7837; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_c0d5c54dc33f7837 ON public.document_metadata USING btree (document_id);


--
-- Name: idx_c0d5c54ddc9ee959; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_c0d5c54ddc9ee959 ON public.document_metadata USING btree (metadata_id);


--
-- Name: idx_d8698a762a86559f; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_d8698a762a86559f ON public.document USING btree (classification_id);


--
-- Name: idx_ed48b61060c36e58; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_ed48b61060c36e58 ON public.document_relation USING btree (dublin_core_relation_id);


--
-- Name: idx_ed48b6107b623c7; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_ed48b6107b623c7 ON public.document_relation USING btree (document_target_id);


--
-- Name: idx_ed48b610870434c0; Type: INDEX; Schema: public; Owner: main
--

CREATE INDEX idx_ed48b610870434c0 ON public.document_relation USING btree (document_source_id);


--
-- Name: metadata_uk; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX metadata_uk ON public.metadata USING btree (term, dublin_core_element_id);


--
-- Name: uniq_880e0d76f85e0677; Type: INDEX; Schema: public; Owner: main
--

CREATE UNIQUE INDEX uniq_880e0d76f85e0677 ON public.admin USING btree (username);


--
-- Name: metadata fk_4f1434141df597a7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.metadata
    ADD CONSTRAINT fk_4f1434141df597a7 FOREIGN KEY (dublin_core_element_id) REFERENCES public.dublin_core_element(id);


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
-- Name: document fk_d8698a762a86559f; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document
    ADD CONSTRAINT fk_d8698a762a86559f FOREIGN KEY (classification_id) REFERENCES public.classification(id);


--
-- Name: document_relation fk_ed48b6101df597a7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_relation
    ADD CONSTRAINT fk_ed48b6101df597a7 FOREIGN KEY (dublin_core_relation_id) REFERENCES public.dublin_core_relation(id);


--
-- Name: document_relation fk_ed48b6107b623c7; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_relation
    ADD CONSTRAINT fk_ed48b6107b623c7 FOREIGN KEY (document_target_id) REFERENCES public.document(id);


--
-- Name: document_relation fk_ed48b610870434c0; Type: FK CONSTRAINT; Schema: public; Owner: main
--

ALTER TABLE ONLY public.document_relation
    ADD CONSTRAINT fk_ed48b610870434c0 FOREIGN KEY (document_source_id) REFERENCES public.document(id);


--
-- PostgreSQL database dump complete
--

