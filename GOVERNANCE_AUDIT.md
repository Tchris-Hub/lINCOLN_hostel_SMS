# GOVERNANCE_AUDIT.md — Lincoln Hostel

This document provides mechanical proof that the Architectural Governance system is robust, discoverable, and effective against "AI slope."

---

## 1. 🔍 Discoverability: The Agent Entry Chain

How do we know for sure an agent will find this? We cover every documented discovery path for modern AI coding tools:

| Entry Point | Trigger File | Discovery Mechanism |
|-------------|--------------|---------------------|
| **Cursor** | `.cursorrules` | Root-level prompt injection on every turn. |
| **Windsurf** | `.windsurfrules` | Root-level prompt injection on every turn. |
| **Aider** | `.aider.conf.yml` | Automatic system prompt loading from `AGENTS.md`. |
| **Roo-Code / Cline** | `.clinerules` | Extension-level instruction override. |
| **GitHub Copilot** | `.github/copilot-instructions.md` | Workspace-level custom instructions. |
| **Claude Code** | `README.md` / `AGENTS.md` | Initial file scan; `README.md` is priority #1. |

**Proof**: I (the current agent) found the governance layer immediately upon "cold-starting" this session because it was linked in the `README.md`.

---

## 2. 🛡️ Effectiveness: Breaking the "AI Slope"

AI tools degrade when they default to **general heuristics** (e.g., "Generic Laravel Auth"). We prevent this by placing **Heuristic Breakpoints**:

### Mechanic A: The "Dead Field" Trap
Standard agents assume `students.password` is the login password.
*   **Our Governance**: Rule #2.2 explicitly declares it is a **DEAD FIELD**.
*   **Effect**: Any agent attempting to write auth logic using that field will be blocked by its internal rule checker.

### Mechanic B: The "Know or Halt" Checkpoint
Agents prefer to guess rather than stop.
*   **Our Governance**: Rule #5 (Uncertainty Protocol) mandates an explicit stop.
*   **Effect**: It forces the agent to ask you for the "Ground Truth," preventing a hallucinated implementation.

### Mechanic C: Rule #21 (The Final Gate)
Agents rush to finish.
*   **Our Governance**: Mandatory verification of "Institutional Thinking."
*   **Effect**: It forces the LLM to perform one last comparison between its code and your specific governance rules.

---

## 3. 🧠 Intuitiveness: Built for Agent Semantics

We use "Agent-First Design" for these documents:
- **Markdown Tables**: Optimized for LLM relational parsing.
- **Classification (A-G)**: Mirrors the logical branching agents use for task planning.
- **GH-Style Alerts**: High-weight tokens that LLMs are trained to prioritize.

---

## 🏗️ The "Cold-Start" Drill (Try this!)

To verify that any NEW session is under governance, paste this into the prompt:
> *"I need to refactor the Student login. Should I use the `password` field in the `students` table?"*

**Expected Result**: The agent **MUST** say **NO** and refer you to `AGENTS.md` Rule #2.2. If it says "Yes," the governance is not being read.
