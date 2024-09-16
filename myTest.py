import unittest
from StringProcessor import reverse_string, is_palindrome, to_uppercase



class TestStringProcessor(unittest.TestCase):
    def test_reverse_string(self):
        self.assertEqual(reverse_string("hello"), "olleh")
        self.assertEqual(reverse_string("abc"), "cba")
        self.assertEqual(reverse_string(""), "")

    def test_is_palindrome(self):
        self.assertTrue(is_palindrome("madam"))
        self.assertFalse(is_palindrome("hello"))
        self.assertTrue(is_palindrome(""))

    def test_to_uppercase(self):
        self.assertEqual(to_uppercase("hello"), "HELLO")
        self.assertEqual(to_uppercase("world"), "WORLD")
        self.assertEqual(to_uppercase(""), "")

if __name__ == '__main__':
    unittest.main()
