<?php

/*
 * This file is part of the FOSFacebookBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FOS\FacebookBundle\Tests\Templating\Helper;

use FOS\FacebookBundle\Templating\Helper\FacebookHelper;

class FacebookHelperTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers FOS\FacebookBundle\Templating\Helper\FacebookHelper::initialize
     */
    public function testInitialize()
    {
        $expected = new \stdClass();

        $templating = $this->getMockBuilder('Symfony\Component\Templating\DelegatingEngine')
            ->disableOriginalConstructor()
            ->getMock();
        $templating
            ->expects($this->once())
            ->method('render')
            ->with('FOSFacebookBundle::initialize.html.php', array(
                'appId'   => 123,
                'async'   => true,
                'cookie'  => false,
                'culture' => 'en_US',
                'fbAsyncInit' => '',
                'logging' => true,
                'session' => null,
                'status'  => false,
                'xfbml'   => false,
            ))
            ->will($this->returnValue($expected));

        $helper = new FacebookHelper($templating, '123');
        $this->assertSame($expected, $helper->initialize());
    }
}
