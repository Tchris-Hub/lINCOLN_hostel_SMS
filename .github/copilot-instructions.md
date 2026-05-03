# Lincoln Hostel GitHub Copilot Instructions
# SINGLE SOURCE OF TRUTH: AGENTS.md

As an AI coding assistant, you must adhere to the following core system rules for the Lincoln Hostel codebase:

1. **Know or Halt**: If system behavior is ambiguous, stop and ask for clarification.
2. **Auth Model**: `students.password` is a dead column. Authentication uses `admission_number` + `contact_number`.
3. **Ledger Rules**: Flow A updates student fee columns. Flow B DOES NOT. Do not link them.
4. **Occupancy**: Always use DB transactions and atomic increments when updating `rooms.occupied`.
5. **Security**: Ensure `gender_type` filtering on all student-facing queries.
6. **Separation**: Admin and Student controllers must remain distinct.
7. **Rule #21**: Always verify if code meets "Institutional Thinking" and "Industry Best Practice" before finalizing.

*For full constraints and classification systems, refer to AGENTS.md at the project root.*
