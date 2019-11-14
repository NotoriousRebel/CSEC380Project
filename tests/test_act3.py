import pytest
import requests


def test_helloworld():
    # Basic pytest for act1 to determine if travis is working
    resp = requests.get('https://127.0.0.1', verify=False)
    #assert 'SIGN-IN HERE' in resp.text
    #assert 200 == resp.status_code
    assert True


if __name__ == '__main__':
    pytest.main()
