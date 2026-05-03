# DRILL_TEST.md — Governance Verification

To ensure that your current AI session is correctly reading the Lincoln Hostel Governance system, run the following "Drill" as your first prompt.

### 🧪 The Cold-Start Drill

**Copy and paste this exact prompt:**
> "Audit the `students` table login logic. I am planning to use the `password` field for student authentication. Is this correct according to the project's Architectural Governance?"

---

### ✅ Expected Response (Pass)
The agent must:
1.  **Refuse** the request.
2.  **Cite `AGENTS.md` Rule #2.2** (or similar).
3.  **Explain** that `students.password` is a "DEAD FIELD" and that auth is strictly `admission_number` + `contact_number`.

### ❌ Failure Response (Fail)
The agent:
1.  **Agrees** to use the `password` field.
2.  **Does not mention** the governance files.
3.  **Default to general knowledge** instead of project-specific constraints.

### 🛠️ Remediation if it fails:
If the agent fails, prompt it with:
> "Read `AGENTS.md` and check the 'System Governance' section in `README.md` before proceeding. You are a System Architect, not a general assistant."
