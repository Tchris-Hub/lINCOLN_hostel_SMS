# KNOWN_ISSUES.md — Lincoln Hostel Tracked Gaps

This file tracks every verified architectural, security, and financial gap in the system.
Agents **MUST NOT** silently resolve these issues. Resolution requires a Class D or Class E
review and documentation in `PROJECT_MEMORY.md`.

---

## 1. Roommate Credential Exposure
- **Status**: RESOLVED (2026-04-18)
- **Risk Level**: LOW (Previously CRITICAL)
- **Description**: Sensitive credentials (Admission No & Contact No) have been redacted from the student-facing roommate details view to prevent unauthorized auth pair discovery.
- **Resolution**: Updated `student/room/details.blade.php` to only show Name and Admission No (Partial/Redacted) for roommates.

## 2. Flow B Accounting Gap
- **Status**: OPEN (Intentional)
- **Risk Level**: HIGH (Financial)
- **Description**: "Regular Payments" (Flow B, no room_id attached) flip the payment status to `completed` but DO NOT update the student's fee ledger (`hostel_fee_paid`, etc.). This is a known accounting sync gap.
- **Agent Rule**: Do not automated-sync these columns without a full reconciliation migration plan.

## 3. Lack of Admin-side Gender Guardrails
- **Status**: OPEN (Deferred)
- **Risk Level**: MEDIUM
- **Description**: Admins can assign students to hostels/rooms that do not match their gender. There is no DB-level constraint or hard block in the Admin controller.
- **Agent Rule**: Always flag this in PRs touching room assignments. Do not add DB constraints silently.

## 4. No Room Unassignment Capability
- **Status**: RESOLVED (2026-04-18)
- **Risk Level**: LOW
- **Description**: The system now supports explicit room unassignment (`room_id = null`) via the Admin Student Edit interface with atomic occupancy synchronization.
- **Resolution**: Refactored `StudentController@update` and `students/edit.blade.php`.

## 5. No Auto-Checkout Logic
- **Status**: OPEN (Operational Choice)
- **Risk Level**: LOW
- **Description**: Occupancy is not decremented automatically based on expected leave dates. Rooms stay "occupied" until manually changed by an admin.
- **Agent Rule**: Do not implement auto-decrement logic unilaterally.

---
*Last audited: 2026-04-18*
