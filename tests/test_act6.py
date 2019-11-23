import pytest
import requests
import urllib3
try:
    urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
    # surpress Unverified HTTPS request warning, due to self signed cert
except Exception as e:
    print(f'An exception has occurred while disabling warnings: {e}')



def test_ssrf():
    #set user
    session = requests.session()
    user = "bob"
    password = "Pass"
    signup_url = 'https://127.0.0.1/signup.php'
    dataSetA = {
        'user': user,
        'pass1': password,
        'pass2': password,
        'submit': 'Register'
    }
    session.post(signup_url, data=dataSetA, verify=False)
    #login
    user = "bob"
    password = "Pass"
    dataSetB = {
        'user': user,
        'pass': password,
        'submit': 'Log-In'
    }
    login_url = 'https://127.0.0.1/login.php'
    session.post(login_url, data=dataSetB, verify=False)  
    #the actual tests
    #test1
    dataSet1 = {
        'upload-submitlink': "Send data",
        'videolink': "http://evnet.student.rit.edu:80/test.mp4"
    }
    r1 = session.post("https://127.0.0.1/upload.php",data=dataSet1, verify=False)
    #test2
    dataSet2 = {
        'upload-submitlink': "Send data",
        'videolink': "http://evnet.student.rit.edu:22/test.mp4"
    }
    r2 = session.post("https://127.0.0.1/upload.php",data=dataSet2, verify=False)
    #test3
    dataSet3 = {
        'upload-submitlink': "Send data",
        'videolink': "http://evnet.student.rit.edu:400/test.mp4"
    }
    r3 = session.post("https://127.0.0.1/upload.php",data=dataSet3, verify=False)
    #test4
    dataSet4 = {
        'upload-submitlink': "Send data",
        'videolink': "http://evnet.student.rit.edu:443/test.mp4"
    }
    r4 = session.post("https://127.0.0.1/upload.php",data=dataSet4, verify=False)
    #verify tests
    assert "Welcome to Memetube" in r1.text
    assert "Error moving file" in r2.text
    assert "Error moving file" in r3.text
    assert "Error moving file" in r4.text
    

if __name__ == '__main__':
    pytest.main()
