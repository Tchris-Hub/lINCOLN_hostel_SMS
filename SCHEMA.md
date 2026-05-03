# SCHEMA.md — Lincoln Hostel Living Snapshot

This file is a snapshot of the core database tables and their significant columns.
Verify this against `database/migrations` before any Class F or Class G change.

---

## students
| Column | Type | Notes |
|--------|------|-------|
| id | bigint | Primary Key |
| admission_number | string | Auth Username |
| contact_number | string | Auth Password (Credential) |
| password | string | **DEAD FIELD** (Stored but not read) |
| gender | string | `male`/`female` |
| room_id | foreignId | Current assignment |
| hostel_fee_amount | decimal | Flow A sets this |
| hostel_fee_paid | decimal | Total paid |
| hostel_fee_status | enum | `unpaid`, `partial`, `paid` |
| parent_phone | string | Notification target |
| parent_email | string | Notification target |
| application_id | bigint | Source application |

## rooms
| Column | Type | Notes |
|--------|------|-------|
| id | bigint | Primary Key |
| hostel_id | foreignId | Parent association |
| room_number | string | Display number |
| room_type | enum | `single`, `double`, etc. |
| capacity | integer | Max occupancy |
| occupied | integer | **Hard State Tracking** (Integer count) |
| status | string | Dynamic: `available`/`full` |
| price_per_semester | decimal | Base pricing |

## payments
| Column | Type | Notes |
|--------|------|-------|
| id | bigint | Primary Key |
| student_id | bigint | Association |
| amount | decimal | Payment value |
| status | enum | `pending`, `completed`, `failed` |
| room_id | bigint | **Flow A Flag** (If present, updates ledger) |
| type | string | `booking` or `fee` |

## hostel_applications
| Column | Type | Notes |
|--------|------|-------|
| id | bigint | Primary Key |
| student_id | bigint | Only for returning |
| status | enum | `pending`, `approved`, `rejected` |
| gender | string | Filter for room options |

---
*Last captured: 2026-04-18*
