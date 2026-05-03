# PROJECT_MEMORY.md — Lincoln Hostel Institutional Memory

This file tracks the "why" and "when" of the system's evolution. It is a machine-readable
ledger for agents and developers to maintain continuity.

---

## ACTIVE DECISIONS

### 2026-04-18 — Establishment of Architectural Governance
- **Decision**: Centralize all system rules and agent constraints in `AGENTS.md`.
- **Rationale**: Prevent "hallucination-by-assumption" in AI agents and ensure cross-tool portability (Claude, Cursor, Aider).
- **Status**: ACTIVE

### 2026-04-18 — Tiered Memory System
- **Decision**: Implement a two-tier memory: `PROJECT_MEMORY.md` (Tracked/Institutional) and `SESSION_LOG.md` (Gitignored/Ephemeral).
- **Rationale**: Preserve permanent system context while allowing noisy session scratchpads.
- **Status**: ACTIVE

### 2026-04-18 — Room Unassignment Logic
- **Decision**: Explicitly support `room_id = null` for students.
- **Rationale**: Necessary for floor management and student transitions.
- **Status**: ACTIVE

---

## KNOWN ISSUES TRACKER
- Reference: `KNOWN_ISSUES.md`
- Status: 5 Critical/High gaps identified and indexed.

---

## SCHEMA STATE
- Reference: `SCHEMA.md`
- Last Migration: `2026_01_22_162730_add_booking_fields_to_payments_table.php` (Verified)

---

## DEFERRED WORK
- [ ] Reconciliation of Flow B accounting gaps (Requires migration script)
- [ ] DB-level gender constraints for room Assignments
- [ ] Comprehensive Payment verification tests

---

## CHANGELOG

### 2026-04-18 — Architectural Hardening & Governance Implementation
- **Class C/D**: Critical System Hardening.
- **Remediated**: Resolved Roommate Credential Exposure (Security).
- **Remediated**: Enabled Room Unassignment with Atomic Occupancy Sync (Logic).
- **Added**: Flexible Intake Management & Comprehensive Demographic/Medical/Parental Data fields.
- **Modified**: `StudentController`, `PaymentController`, `RoomController`, `create.blade.php`, `edit.blade.php`, `show.blade.php`, `details.blade.php`.
- **Status**: ACTIVE

---
*Last updated: 2026-04-18 by Lincoln Hostel System Architect Agent*
