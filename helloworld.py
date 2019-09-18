import pytest


def test_helloworld():
    # Basic pytest for act1 to determine if travis is working
    assert 'Hello World' == 'Hello World'


if __name__ == '__main__':
    pytest.main()
