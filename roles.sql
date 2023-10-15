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

 Date: 15/10/2023 12:28:51
*/


-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id" "pg_catalog"."int8" NOT NULL DEFAULT nextval('roles_id_seq'::regclass),
  "nama_role" "pg_catalog"."varchar" COLLATE "pg_catalog"."default",
  "created_at" "pg_catalog"."timestamp",
  "updated_at" "pg_catalog"."timestamp"
)
;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO "public"."roles" VALUES (1, 'admin', '2023-10-15 00:20:15', '2023-10-15 00:20:17');
INSERT INTO "public"."roles" VALUES (2, 'pegawai', '2023-10-15 00:20:15', '2023-10-15 00:20:15');

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");
