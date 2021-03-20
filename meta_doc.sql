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
1	admin	["ROLE_ADMIN"]	$argon2id$v=19$m=65536,t=4,p=1$pXnVrkFDGFMCrsKEgF2ycw$dDq8lHi5lZ2VHIudPn7OfmDUeEkBOUsVtByZNQbKosc
\.


--
-- Data for Name: classification; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.classification (id, code, description, title) FROM stdin;
5	00003	<div>test 00003</div>	test 00003
2	00001	<div>Premier noeud</div>	Classification test premier noeud
1	00000	<div>Noeud racine home.</div>	Home
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
DoctrineMigrations\\Version20210211181752	2021-02-11 13:23:50	28
DoctrineMigrations\\Version20210211193342	2021-02-11 14:33:50	11
DoctrineMigrations\\Version20210215030744	2021-02-14 22:08:31	39
DoctrineMigrations\\Version20210215143900	2021-02-15 09:47:37	10
DoctrineMigrations\\Version20210215144731	2021-02-15 09:47:37	3
DoctrineMigrations\\Version20210215151214	2021-02-15 10:12:45	10
DoctrineMigrations\\Version20210215151403	2021-02-15 10:14:28	31
DoctrineMigrations\\Version20210216201118	\N	\N
DoctrineMigrations\\Version20210216201318	\N	\N
DoctrineMigrations\\Version20210216201927	2021-02-16 15:19:49	9
DoctrineMigrations\\Version20210216233711	2021-02-16 18:37:22	36
DoctrineMigrations\\Version20210218202418	2021-02-18 15:26:04	35
DoctrineMigrations\\Version20210218203542	2021-02-18 15:36:03	9
DoctrineMigrations\\Version20210219020958	2021-02-18 21:21:21	55
DoctrineMigrations\\Version20210219192742	2021-02-19 14:30:37	13
DoctrineMigrations\\Version20210222150730	2021-02-22 10:08:51	51
DoctrineMigrations\\Version20210224201307	2021-02-24 15:13:47	15
DoctrineMigrations\\Version20210225022748	2021-02-24 21:30:51	27
DoctrineMigrations\\Version20210302163534	\N	\N
DoctrineMigrations\\Version20210302163807	\N	\N
DoctrineMigrations\\Version20210302164225	2021-03-02 11:43:10	32
DoctrineMigrations\\Version20210302164651	2021-03-02 11:47:09	24
DoctrineMigrations\\Version20210302184354	2021-03-02 13:43:59	10
DoctrineMigrations\\Version20210302212838	2021-03-02 16:30:18	10
DoctrineMigrations\\Version20210302213211	2021-03-02 16:32:31	32
DoctrineMigrations\\Version20210302213600	2021-03-02 16:36:23	12
DoctrineMigrations\\Version20210302223549	2021-03-02 17:36:17	30
DoctrineMigrations\\Version20210303190146	2021-03-03 14:02:45	56
DoctrineMigrations\\Version20210303190451	2021-03-03 14:08:53	11
DoctrineMigrations\\Version20210303194251	2021-03-03 14:52:11	53
DoctrineMigrations\\Version20210303205503	2021-03-03 22:59:49	10
DoctrineMigrations\\Version20210304035920	2021-03-03 22:59:49	0
DoctrineMigrations\\Version20210304040221	2021-03-03 23:02:45	76
DoctrineMigrations\\Version20210304141711	2021-03-04 09:17:31	11
DoctrineMigrations\\Version20210304141851	\N	\N
DoctrineMigrations\\Version20210304142330	\N	\N
DoctrineMigrations\\Version20210304142541	\N	\N
DoctrineMigrations\\Version20210304143223	\N	\N
DoctrineMigrations\\Version20210304143623	2021-03-04 09:38:45	33
DoctrineMigrations\\Version20210304144534	2021-03-04 09:47:37	33
DoctrineMigrations\\Version20210304161728	2021-03-04 11:17:57	10
DoctrineMigrations\\Version20210306170327	\N	\N
DoctrineMigrations\\Version20210306172510	2021-03-06 12:26:28	50
DoctrineMigrations\\Version20210308180312	2021-03-08 13:03:35	29
DoctrineMigrations\\Version20210308182206	2021-03-08 13:22:11	29
DoctrineMigrations\\Version20210308190325	2021-03-08 14:03:30	29
DoctrineMigrations\\Version20210315182640	2021-03-15 14:26:56	17
DoctrineMigrations\\Version20210318012403	2021-03-17 21:24:39	9
DoctrineMigrations\\Version20210318012540	2021-03-17 21:25:57	31
\.


--
-- Data for Name: document; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document (id, text, title, start_date, end_date, state, version, classification_id) FROM stdin;
2	doc cla 00001 text test text test tess test long tès long	doc cla 00001 test 2	2021-02-12	\N	\N	\N	2
9	test 5	test 5	2021-02-16	\N	\N	\N	1
6	<div>test 346</div>	vf test 3	2021-02-16	2018-02-03	en cours	\N	1
7	<div>test 4</div>	test 4	2021-02-16	\N	\N	\N	1
10	\N	test34	2021-03-04	\N	\N	\N	2
11	<div><strong>test</strong></div>	test55	2021-03-05	\N	creation	\N	2
12	<div>test</div>	test 56	2021-03-05	\N	creation	\N	1
13	<div>test</div>	test 12353	2021-03-05	\N	creation	\N	1
14	test 2	vini test	2021-03-09	2016-01-01	\N	\N	1
15	TEST	testVINCENT	2021-03-09	2016-01-01	\N	\N	1
16	\N	test vini 333	2021-03-09	2016-01-01	\N	\N	1
17	\N	testultimevini	2021-03-09	2016-01-01	\N	\N	2
18	\N	testvini5	2021-03-10	2016-01-01	\N	\N	1
20	<p>test</p>\r\n\r\n<p><strong>test<em>&nbsp;en italique&nbsp;</em></strong></p>\r\n\r\n<ul>\r\n\t<li><strong><em>points de forme</em></strong></li>\r\n</ul>	test ckeditor	2021-03-12	\N	\N	\N	1
4	<div>test 346<strong>cece<br></strong><br></div>	vf test	2021-02-16	2018-02-03	\N	\N	1
19	<div>testVF2036</div>	test2036	2021-03-12	2016-01-01	\N	\N	1
3	<div>test</div>	test	2021-02-16	\N	state.creation	\N	1
\.


--
-- Data for Name: document_metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_metadata (document_id, metadata_id) FROM stdin;
12	4
12	5
13	4
13	5
14	5
15	4
16	5
17	4
18	8
18	7
20	8
20	5
3	4
3	8
\.


--
-- Data for Name: document_relation; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.document_relation (id, dublin_core_relation_id, document_source_id, document_target_id) FROM stdin;
3	5	9	6
4	2	19	7
5	4	3	19
6	2	6	3
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
7	isVersionOf	A related resource of which the described resource is a version, edition, or adaptation.
8	hasFormat	A related resource that is substantially the same as the pre-existing described resource, but in another format.
9	hasPart	A related resource that is included either physically or logically in the described resource.
10	hasVersion	A related resource that is a version, edition, or adaptation of the described resource.
\.


--
-- Data for Name: metadata; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.metadata (id, term, description, dublin_core_element_id) FROM stdin;
4	term_test	test titre terme	1
5	term2_test2	test2	2
6	tern3	test3	1
7	term4	term4desc	2
8	term5	term5desc	4
9	premiertest	test	1
\.


--
-- Name: admin_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.admin_id_seq', 1, true);


--
-- Name: classification_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.classification_id_seq', 8, true);


--
-- Name: document_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_id_seq', 21, true);


--
-- Name: document_relation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.document_relation_id_seq', 6, true);


--
-- Name: dublin_core_element_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.dublin_core_element_id_seq', 54, true);


--
-- Name: dublin_core_relation_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.dublin_core_relation_id_seq', 54, true);


--
-- Name: metadata_id_seq; Type: SEQUENCE SET; Schema: public; Owner: main
--

SELECT pg_catalog.setval('public.metadata_id_seq', 9, true);


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

