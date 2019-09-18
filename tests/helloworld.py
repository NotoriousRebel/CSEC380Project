import pytest
import requests


def test_helloworld():
    # Basic pytest for act1 to determine if travis is working
    resp = requests.get('http://localhost')
    assert 'Hello World' in resp.text
    assert 200 == resp.status_code


if __name__ == '__main__':
    pytest.main()
