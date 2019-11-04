import pytest
import requests


def test_helloworld():
    # Basic pytest for act1 to determine if travis is working
    resp = requests.get('http://localhost:82')
    # Port 82 due to port mapping
    assert 'SIGN-IN HERE' in resp.text
    assert 200 == resp.status_code


if __name__ == '__main__':
    pytest.main()
