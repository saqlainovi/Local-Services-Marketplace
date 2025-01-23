# Home Service Management System - Input Validation Test Cases
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

[... content continues with all test scenarios as shown above ...] 