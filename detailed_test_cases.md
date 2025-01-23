# Home Service Management System - Test Cases
### Tester Information
- **Name:** Md Siyam Saqlain Ovi
- **ID:** 212002082
- **Test Date:** March 2024
- **Project Version:** 1.0

## Test Scenario 1: Phone Number Validation
### Test Case ID: TC_001
**Created By:** Md Siyam Saqlain Ovi
**Reviewed By:** Senior QA
**Version:** 1.0
**Date Tested:** March 15, 2024

#### Prerequisites:
1. Access to registration form
2. Internet connection
3. Web browser (Chrome/Firefox/Safari)

#### Test Steps and Results:

| Step # | Test Data | Expected Results | Actual Results | Status |
|--------|-----------|------------------|----------------|---------|
| 1 | Phone = 09283490895 | Phone must be 11 digit, Must start with 013/014/015/016/017/018/019 | Not As Expected, Phone number must start with 013/014/015/016/017/018/019 | Fail |
| 2 | Phone = 01983490884 | Phone must be 11 digit, Must start with 013/014/015/016/017/018/019 | Not As Expected, More than 11 digit given | Fail |
| 3 | Phone = 092834908 | Phone must be 11 digit | Not As Expected, less than 11 digit given | Fail |
| 4 | Phone = 11111111111 | Must start with 013/014/015/016/017/018/019 | Not As Expected, All digits are same | Fail |
| 5 | Phone = 0175428415R | No character allowed | Not As Expected, Entered Character | Fail |
| 6 | Phone = 0175428415@ | No special character allowed | Not As Expected, entered Special Character | Fail |
| 7 | Phone = 01753284153 | Valid phone number format | As Expected | Pass |

## Test Scenario 2: Email Validation
### Test Case ID: TC_002
**Created By:** Md Siyam Saqlain Ovi
**Reviewed By:** Senior QA
**Version:** 1.0
**Date Tested:** March 15, 2024

#### Prerequisites:
1. Access to registration form
2. Internet connection

#### Test Steps and Results:

| Step # | Test Data | Expected Results | Actual Results | Status |
|--------|-----------|------------------|----------------|---------|
| 1 | Email = test@gmail | Must include .com/.net/.org etc | Not As Expected, Invalid email format | Fail |
| 2 | Email = test.com | Must include @ symbol | Not As Expected, Missing @ symbol | Fail |
| 3 | Email = @gmail.com | Must have characters before @ | Not As Expected, Missing username | Fail |
| 4 | Email = test@.com | Must have domain name | Not As Expected, Missing domain | Fail |
| 5 | Email = test@@gmail.com | Only one @ allowed | Not As Expected, Multiple @ symbols | Fail |
| 6 | Email = test@gmail.c | Domain extension too short | Not As Expected, Invalid domain extension | Fail |
| 7 | Email = test@gmail.com | Valid email format | As Expected | Pass |

## Test Scenario 3: Password Validation
### Test Case ID: TC_003
**Created By:** Md Siyam Saqlain Ovi
**Reviewed By:** Senior QA
**Version:** 1.0
**Date Tested:** March 15, 2024

#### Prerequisites:
1. Access to registration form

#### Test Steps and Results:

| Step # | Test Data | Expected Results | Actual Results | Status |
|--------|-----------|------------------|----------------|---------|
| 1 | Password = abc | Must be at least 8 characters | Not As Expected, Too short | Fail |
| 2 | Password = password123 | Must include uppercase letter | Not As Expected, Missing uppercase | Fail |
| 3 | Password = PASSWORD123 | Must include lowercase letter | Not As Expected, Missing lowercase | Fail |
| 4 | Password = Password | Must include number | Not As Expected, Missing number | Fail |
| 5 | Password = Password1 | Must include special character | Not As Expected, Missing special character | Fail |
| 6 | Password = Pass 123! | No spaces allowed | Not As Expected, Contains space | Fail |
| 7 | Password = Pass@123 | Valid password format | As Expected | Pass |

## Test Scenario 4: Name Validation
### Test Case ID: TC_004
**Created By:** Md Siyam Saqlain Ovi
**Reviewed By:** Senior QA
**Version:** 1.0
**Date Tested:** March 15, 2024

#### Prerequisites:
1. Access to registration form

#### Test Steps and Results:

| Step # | Test Data | Expected Results | Actual Results | Status |
|--------|-----------|------------------|----------------|---------|
| 1 | Name = A | Must be at least 3 characters | Not As Expected, Too short | Fail |
| 2 | Name = John123 | No numbers allowed | Not As Expected, Contains numbers | Fail |
| 3 | Name = John@Doe | No special characters allowed | Not As Expected, Contains special characters | Fail |
| 4 | Name = JohnDoe | Must include space between names | Not As Expected, Missing space between names | Fail |
| 5 | Name = J D | Names too short | Not As Expected, Names too short | Fail |
| 6 | Name = John  Doe | No multiple spaces allowed | Not As Expected, Multiple spaces | Fail |
| 7 | Name = John Doe | Valid name format | As Expected | Pass |

## Test Scenario 5: Service Type Validation
### Test Case ID: TC_005
**Created By:** Md Siyam Saqlain Ovi
**Reviewed By:** Senior QA
**Version:** 1.0
**Date Tested:** March 15, 2024

#### Prerequisites:
1. Access to service selection form

#### Test Steps and Results:

| Step # | Test Data | Expected Results | Actual Results | Status |
|--------|-----------|------------------|----------------|---------|
| 1 | Service = "" | Must select a service | Not As Expected, No service selected | Fail |
| 2 | Service = Multiple | Only one service at a time | Not As Expected, Multiple selections | Fail |
| 3 | Service = Invalid | Must be from provided list | Not As Expected, Invalid service type | Fail |
| 4 | Service = Painter | Valid service selection | As Expected | Pass |
| 5 | Service = Plumber | Valid service selection | As Expected | Pass |
| 6 | Service = Electrician | Valid service selection | As Expected | Pass |
| 7 | Service = TV Repair | Valid service selection | As Expected | Pass |

## Summary
- **Total Test Cases:** 35
- **Passed:** 7
- **Failed:** 28
- **Pass Percentage:** 20%

## Testing Environment
- **Browser:** Chrome Version 120
- **Operating System:** Windows 10
- **Screen Resolution:** 1920x1080
- **Database:** MySQL 8.0.30

## Notes
- All failed cases show appropriate error messages
- Validation is performed in real-time
- Error messages are clear and user-friendly

## Recommendations
1. Implement client-side validation for immediate feedback
2. Add tooltips explaining validation rules
3. Consider implementing progressive validation
4. Add visual indicators for validation status

---
*Test Cases Executed By:* Md Siyam Saqlain Ovi  
*ID:* 212002082  
*Date:* March 2024