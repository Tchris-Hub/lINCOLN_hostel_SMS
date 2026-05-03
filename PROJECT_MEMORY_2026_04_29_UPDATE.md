PROJECT_MEMORY UPDATE (2026-04-29)

Existing before:
- Admin/student dashboards and auth existed.
- Room assignment/reassignment existed.
- Department and intake options were static in forms.

Changed now:
- Added departments/intakes migrations and models.
- Added DepartmentController and IntakeController.
- Added admin routes for departments/intakes.
- Added safe student directory route.
- Added directory() method to StudentsDashboardController.
- Added student directory view.

Pending hardening:
- StudentController dynamic dropdown wiring.
- Occupancy non-negative guards in StudentController.
- Semester-based attendance filtering enhancements.
