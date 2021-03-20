--
-- PostgreSQL database dump
--

--
-- Data for Name: dublin_core; Type: TABLE DATA; Schema: public; Owner: main
--

COPY public.dublin_core_relation (id, relation, definition) FROM stdin;
1	置換者	記述されたリソースをサポート、配置解除、または置き換えする関連リソース。
2	フォーマット	既存の関連リソース。これは、記述されたリソースと実質的に同じですが、別のフォーマットで行われます。
3	次の部分	記述されたリソースが物理的または論理的に組み込まれている関連リソース。
4	参照者	記述されたリソースを参照、引用したり、それ以外の点で指し示す関連リソース。
5	要求者	機能、配信、またはコヒーレンスをサポートするには、記述されたリソースを必要とする関連リソース。
6	次のバージョン	記述されたリソースがバージョン、エディション、または順応である関連リソース。
7	形式あり	既存の記述済みリソースと実質的に同じであるが、別の形式ではない関連リソース。
8	パーツあり	記述されたリソース内に物理的または論理的に組み込まれる関連リソース。
9	バージョンあり	記述されたリソースのバージョン、エディション、または順応である関連リソース。
\.

SELECT setval('dublin_core_relation_id_seq', 50, true);
--
-- PostgreSQL database dump complete
--

