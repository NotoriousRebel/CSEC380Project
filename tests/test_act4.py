import pytest
import requests
import urllib3
from bs4 import BeautifulSoup

try:
    urllib3.disable_warnings(urllib3.exceptions.InsecureRequestWarning)
    # surpress Unverified HTTPS request warning, due to self signed cert
except Exception as e:
    print(f'An exception has occurred while disabling warnings: {e}')


def test_suite_act4():
    # LOGIN TEST
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

    # UPLOAD TEST
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

    # DELETE TEST
    delete_url = 'https://127.0.0.1/delete.php'
    soup = BeautifulSoup(vid_upload_resp.text, 'html.parser')
    vid_name = str(soup.find('video')['src'].split('/')[1].strip())
    # parse out the vidname to know which video to delete
    # in our case it is just the first video as there is only one uploaded
    data = {
        'vidID': 1,
        'vidName': vid_name,
        'delete-submit': ''
    }
    vid_delete_resp = sess.post(delete_url, data=data, verify=False)
    assert vid_delete_resp.status_code == 200
    assert 'Posted by Colonel_Sanders' not in vid_delete_resp.text
    # Indicates the video has been deleted


if __name__ == '__main__':
    pytest.main()
