import pytest
import requests
import urllib3
try:
    urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
    # surpress Unverified HTTPS request warning, due to self signed cert
except Exception as e:
    print(f'An exception has occurred while disabling warnings: {e}')


def test_upload():
    sess = requests.Session()
    user = "Colonel_Sanders"
    password = "kfc"
    data = {
        'user': user,
        'pass': password,
        'submit': 'Log-In'
    }
    login_url = 'https://127.0.0.1/login.php'
    resp = sess.post(login_url, data=data, verify=False)
    # login with created user
    assert 200 == resp.status_code
    assert "Welcome to Memetube, Colonel_Sanders" in resp.text
    # Verify login still works properly
    data = {
        'videolink': 'http://www.onirikal.com/videos/mp4/nestlegold.mp4',
        'upload-submitlink': 'Send+data'
    }
    vid_upload_resp = sess.post(
        'https://127.0.0.1/upload.php',
        data=data,
        verify=False)
    assert vid_upload_resp.status_code == 200
    assert 'Posted by Colonel_Sanders' in vid_upload_resp.text
    # Indicates the video has been uploaded successfully


if __name__ == '__main__':
    pytest.main()
