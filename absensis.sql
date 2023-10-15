/*
 Navicat Premium Data Transfer

 Source Server         : Local Postgre
 Source Server Type    : PostgreSQL
 Source Server Version : 150002
 Source Host           : localhost:5432
 Source Catalog        : tk-3
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 150002
 File Encoding         : 65001

 Date: 15/10/2023 12:29:00
*/


-- ----------------------------
-- Table structure for absensis
-- ----------------------------
DROP TABLE IF EXISTS "public"."absensis";
CREATE TABLE "public"."absensis" (
  "id" "pg_catalog"."int8" NOT NULL DEFAULT nextval('absensis_id_seq'::regclass),
  "user_id" "pg_catalog"."int8" NOT NULL,
  "absen_masuk" "pg_catalog"."timestamp",
  "absen_keluar" "pg_catalog"."timestamp",
  "keterangan" "pg_catalog"."varchar" COLLATE "pg_catalog"."default",
  "created_at" "pg_catalog"."timestamp",
  "updated_at" "pg_catalog"."timestamp"
)
;

-- ----------------------------
-- Records of absensis
-- ----------------------------
INSERT INTO "public"."absensis" VALUES (1, 2, '2023-10-15 08:57:12', '2023-10-15 11:57:14', 'Masuk', '2023-10-15 11:57:31', '2023-10-15 11:57:33');
INSERT INTO "public"."absensis" VALUES (2, 3, '2023-10-15 08:57:12', '2023-10-15 11:57:14', 'Masuk', '2023-10-15 11:57:31', '2023-10-15 11:57:33');
INSERT INTO "public"."absensis" VALUES (3, 4, '2023-10-15 08:57:12', '2023-10-15 11:57:14', 'Masuk', '2023-10-15 11:57:31', '2023-10-15 11:57:33');
INSERT INTO "public"."absensis" VALUES (4, 5, '2023-10-15 08:57:12', '2023-10-15 11:57:14', 'Masuk', '2023-10-15 11:57:31', '2023-10-15 11:57:33');

-- ----------------------------
-- Primary Key structure for table absensis
-- ----------------------------
ALTER TABLE "public"."absensis" ADD CONSTRAINT "absensis_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table absensis
-- ----------------------------
ALTER TABLE "public"."absensis" ADD CONSTRAINT "absensis_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "public"."users" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
